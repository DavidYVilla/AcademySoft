<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignaciones extends Model
{
    use HasFactory;
    protected $table='asignaciones';
    protected $fillable=[
        'usuarios_id',
        'cursos_id',
        'fecha_inicio',
        'fecha_finalizacion',
        'importe',
        'estado'
    ];
    //Relacion con Usuarios
    public function usuario(){
        return $this->belongsTo(User::class,'usuarios_id');
    }
    public function curso(){
        return $this->belongsTo(Curso::class,'cursos_id');
    }
}
