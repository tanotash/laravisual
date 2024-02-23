<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
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
        $empleados = new Empleado();

        $empleados->nombre = $request->get('nombre');
        $empleados->apellido = $request->get('apellido');
        $empleados->idrol = $request->get('rol');
        $empleados->idobra = $request->get('obra');
        $empleados->dni = $request->get('dni');
        $empleados->save();
        return redirect('/empleados');

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
        return redirect('/empleados');
    }
}
