<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function listaUsuarios(){
        $usuarios = User::all();

        return view('usuarios/listar', compact('usuarios'));
    }
    public function crearUsuario(){
        return view('usuarios/create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo' => ['required', 'string'],
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->tipo = $request->tipo;

    if($usuario->save()){
        return redirect('/usuarios/listar')->with('success', 'Registro agregado correctamente!');
    }else{
        return back()->with('error','El registro no fue realizado!');
    }
}
public function elimina($id) {
    $usuario=User::find($id);
    // $usuario->delete();
    if($usuario->delete()) {
        return redirect('/usuarios/listar')->with('success', 'Registro eliminado correctamente!');
    }else{
        return back()->with('error','El registro no fue eliminado!');
    }
}
}
