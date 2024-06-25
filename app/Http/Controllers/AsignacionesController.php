<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\asignaciones;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asignaciones=asignaciones::with('usuario','curso')->orderBy('id','DESC')->paginate(10);

        return view('asignaciones.index',compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $usuarios=User::where('tipo','Estudiante')->orderBy('id','ASC')->paginate(10);
        $cursos=Curso::orderBy('id','ASC')->paginate(10);
        return view('asignaciones.create',compact('usuarios','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[
            'usuarios_id'=>'required',
            'cursos_id'=>'required',
            'fecha_inicio'=>'required',
            'fecha_finalizacion'=>'required',
            'importe'=>'required',
        ]);

        $asignacion = new asignaciones();
        $asignacion->usuarios_id=$request->usuarios_id;
        $asignacion->cursos_id=$request->cursos_id;
        $asignacion->fecha_inicio= $request->fecha_inicio;
        $asignacion->fecha_finalizacion= $request->fecha_finalizacion;
        $asignacion->importe= $request->importe;
        $asignacion->estado=true;

    if($asignacion->save()){
        return redirect('/asignaciones/index')->with('success', 'Registro agregado correctamente!');
    }else{
        return back()->with('error','El registro no fue realizado!');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(asignaciones $asignaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $asignacion=asignaciones::find($id);
        $usuarios=User::where('tipo','Estudiante')->orderBy('id','ASC')->paginate(10);
        $cursos=Curso::orderBy('id','ASC')->paginate(10);

        return view('asignaciones.edit',compact('asignacion','usuarios','cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'usuarios_id'=>'required',
            'cursos_id'=>'required',
            'fecha_inicio'=>'required',
            'fecha_finalizacion'=>'required',
            'importe'=>'required',
        ]);
        $asignacion=asignaciones::find($id);

        $asignacion->usuarios_id=$request->usuarios_id;
        $asignacion->cursos_id=$request->cursos_id;
        $asignacion->fecha_inicio= $request->fecha_inicio;
        $asignacion->fecha_finalizacion= $request->fecha_finalizacion;
        $asignacion->importe= $request->importe;
        $asignacion->estado=true;
        if ($asignacion->save()) {
            return redirect('/asignaciones/index')->with('success', 'Registro actualizado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(asignaciones $asignaciones)
    {
        //
    }
    public function estado($id){
        $asignacion=asignaciones::find($id);
            $asignacion->estado = !$asignacion->estado;
            if($asignacion->save()){
                return redirect('/asignaciones/index')->with('success','Estado actualizado correctamente');
            }else{
                return back()->with('eror','Estado no ha sido actualizado');
            }
        }
}
