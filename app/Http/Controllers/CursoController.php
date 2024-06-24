<?php

namespace App\Http\Controllers;

use App\Models\Curso;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cursos=Curso::orderBy('id','DESC')
                            ->paginate(10);
        return view('cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nombre'=>'required|unique:cursos',
            'imagen'=>'nullable|image|mimes:png,jpg,jpg,jpeg',
            'descripcion'=>'nullable|string|min:10|max:500',
            'costo'=>'required|numeric|min:0'
        ]);
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('curso_') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }
        $curso = new curso();
        $curso->nombre=$request->nombre;
        $curso->imagen=$nombreImagen;
        $curso->descripcion= $request->descripcion;
        $curso->estado=true;
        $curso->costo=$request->costo;
    if($curso->save()){
        return redirect('/cursos.index')->with('success', 'Curso agregado correctamente!');
    }else{
        return back()->with('error','El curso no fue registrado!');
    }
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $curso=Curso::find($id);
        return view('cursos.edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $this->validate($request,[
            'nombre'=>'required',
            'imagen'=>'nullable|image|mimes:png,jpg,jpg,jpeg',
            'descripcion'=>'nullable|string|min:10|max:500',
            'costo'=>'required|numeric|min:0'
        ]);
        $curso=Curso::find($id);
        if($request->file('imagen')){
            // eliminar la imagen anterior
            if($curso->imagen != 'default.png'){
                if(file_exists(public_path().'/imagenes/cursos/'.$curso->imagen)){
                    unlink(public_path().'/imagenes/cursos/'.$curso->imagen);
                }
            }

            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('curso_') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);

            $curso->imagen = $nombreImagen;
        }
        $curso->nombre=$request->nombre;
        $curso->descripcion=$request->descripcion;
        $curso->costo=$request->costo;
        if ($curso->save()) {
            return redirect('/cursos/index')->with('success', 'Registro actualizado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué actualizado!');
        }
    }
    public function estado($id){
        $curso=curso::find($id);
            $curso->estado = !$curso->estado;
            if($curso->save()){
                return redirect('/cursos/index')->with('success','Estado actualizado correctamente');
            }else{
                return back()->with('eror','Estado no ha sido actualizado');
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
