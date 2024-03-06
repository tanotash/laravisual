<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
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
        $proyectos = Proyecto::all();
        return view('proyectos.index')->with('proyectos', $proyectos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $proyecto->nombre = $request->get('nombre');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->tipoProyecto = $request->get('tipoProyecto');
        $proyecto->ubicacion = $request->get('ubicacion');
        
        $proyecto->save();

        return redirect('/proyectos')->with('alert-success', 'Proyecto guardado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyectos.edit')->with('proyecto', $proyecto);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->nombre = $request->get('nombre');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->tipoProyecto = $request->get('tipoProyecto');
        $proyecto->ubicacion = $request->get('ubicacion');

        $proyecto->save();
        
        return redirect('/proyectos')->with('alert-success', 'Proyecto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);

        $proyecto->delete();
        return redirect('/proyectos')->with('alert-success', 'Proyecto eliminado con éxito.');
    }
}
