<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $fillable = [
        'asignacion_id',
        'descripcion',
        'entrega',
        'nota'
    ];
    public function asignaciones(){
        return $this->belongsTo(asignaciones::class,'asignacion_id');
    }

}
