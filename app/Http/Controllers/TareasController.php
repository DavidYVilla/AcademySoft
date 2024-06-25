<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\tareas;
use App\Models\asignaciones;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asignaciones=asignaciones::where('usuarios_id',auth()->user()->id)->get()->pluck('id');;
        $tareas=tareas::whereIn('asignacion_id',$asignaciones)->orderBy('id','DESC')->paginate(10);
        $todo=tareas::orderby('id','DESC')->paginate(10);

        // $asignaciones=asignaciones::with('usuario')->paginate(10);
 //dd($tareas);
 //dd($asignaciones);
        return view('tareas.index',compact('tareas','todo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id,$usuario,$curso)
    {
        //


        return view('tareas.create',compact('id','usuario', 'curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        //
         $this->validate($request,[

            'descripcion'=>'required',
        ]);

        $tarea = new tareas();
        $tarea->asignacion_id=$id;
        $tarea->descripcion=$request->descripcion;
        $tarea->entrega= false;
        $tarea->nota= 0;

    if($tarea->save()){
        return redirect('/tareas/index')->with('success', 'Registro agregado correctamente!');
    }else{
        return back()->with('error','El registro no fue realizado!');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(tareas $tareas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tarea=tareas::find($id);

        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nota'=>'required|numeric|min:0|max:100',

        ]);
        $nota=tareas::find($id);

        $nota->nota=$request->nota;

        if ($nota->save()) {
            return redirect('/tareas/index')->with('success', 'Tarea Calificada!');
        } else {
            return back()->with('error', 'El registro no fué actualizado!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tareas $tareas)
    {
        //
    }
    public function estado($id){
        $tarea=tareas::find($id);
            $tarea->entrega = !$tarea->entrega;
            if($tarea->save()){
                return redirect('/tareas/index')->with('success','Tarea entregada correctamente');
            }else{
                return back()->with('eror','Tarea no ha sido entregada');
            }
        }
}
