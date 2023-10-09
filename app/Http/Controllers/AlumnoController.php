<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Ciclo;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create', ['ciclos' => Ciclo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:alumnos|max:9',
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'required|max:255',
            'ciclo' => 'required',
        ]);

        $alumno = new Alumno();
        $alumno->codigo = $request->input('codigo');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->ciclo_id = $request->input('ciclo');
        $alumno->save();

        return view("alumnos.message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.edit', ['alumno' => $alumno, 'ciclos' => Ciclo::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|max:9|unique:alumnos,codigo,' . $id,
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'required|max:255',
            'ciclo' => 'required',
        ]);

        $alumno = Alumno::find($id);
        $alumno->codigo = $request->input('codigo');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->ciclo_id = $request->input('ciclo');
        $alumno->save();

        return view("alumnos.message", ['msg' => "Registro modificado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect("alumnos");
    }
}
