<?php

namespace App\Http\Controllers;

use App\Models\DeletedRecord;
use Illuminate\Http\Request;
use App\Models\Empleado;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Proyecto;
use Imagick;
use App\Models\Cargo;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        $cargos = Cargo::with('empleados')->get();
        $proyectos = Proyecto::with('empleados')->get();
        return view('empleados.index', compact('empleados', 'proyectos', 'cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $proyectos = Proyecto::all();
        $cargos = Cargo::all();
        return view('empleados.create', compact('proyectos', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->get('nombre');
        $empleado->apellido = $request->get('apellido');
        $empleado->idrol = $request->get('rol');
        $empleado->idobra = $request->get('obra');
        $empleado->dni = $request->get('dni');
        
        $empleado->save();

        // Generar QR
        $qrCodePath = 'qrcodes/' . $empleado->id . '.png';
        QrCode::format('svg')  //modificar dependiendo del SO que se use
            ->size(400)
            ->generate(route('empleados.show', $empleado->id), public_path($qrCodePath));
        
        // Guardar ruta del QR en la base de datos
        $empleado->qr_path = $qrCodePath;
        $empleado->save();

        return redirect('/empleados')->with('alert-success', 'Empleado guardado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::find($id);
        $proyectos = Proyecto::all();
        $cargos = Cargo::all();

        return view('empleados.edit', compact('empleado','proyectos', 'cargos')); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleado = Empleado::find($id);

        $empleado->nombre = $request->get('nombre');
        $empleado->apellido = $request->get('apellido');
        $empleado->idrol = $request->get('rol');
        $empleado->idobra = $request->get('obra');
        $empleado->dni = $request->get('dni');

        // Generar QR nuevamente si es necesario
        $qrCodePath = 'qrcodes/' . $empleado->id . '.png';
        QrCode::format('svg')->
            size(400)->generate(route('empleados.show', $empleado->id), public_path($qrCodePath));

        // Actualizar ruta del QR en la base de datos (si decides almacenar la ruta)
        $empleado->qr_path = $qrCodePath;
        $empleado->save();

        return redirect('/empleados');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::find($id);

        $EpleadoEliminado = new DeletedRecord();

        $EpleadoEliminado->nombre = $empleado->nombre;
        $EpleadoEliminado->apellido = $empleado->apellido;
        $EpleadoEliminado->idrol = $empleado->idrol;
        $EpleadoEliminado->idobra = $empleado->idobra;
        $EpleadoEliminado->dni = $empleado->dni;
        $EpleadoEliminado->original_id = $empleado->id;
        $EpleadoEliminado->delete_by = auth()->user()->id;
        $EpleadoEliminado->save();
        
        $empleado->delete();
        return redirect('/empleados')->with('alert-success', 'Empleado eliminado con éxito.');
    }


}
