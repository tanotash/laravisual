<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;

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
        return view('empleados.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
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
        QrCode::size(400)
            ->format('png')
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
        return view('empleados.edit')->with('empleado', $empleado); 

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
        QrCode::
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
        $empleado->delete();
        return redirect('/empleados')->with('alert-success', 'Empleado eliminado con éxito.');
    }

    public function generarQR($empleado){
        $nombreArchivo = "QR_{$empleado->nombre}_{$empleado->apellido}.png";
        $rutaArchivo = public_path("qrcodes/{$nombreArchivo}");

        QrCode::format('png')
            ->size(100)
            ->generate("{$empleado->nombre}-{$empleado->apellido}", $rutaArchivo);
        
            return $rutaArchivo;

    }
}
