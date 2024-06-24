<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'costo',
        'estado',
        'inscrito'
    ];
    public function getImagenUrl(){
        if($this->imagen && $this->imagen != 'default.png' && $this->imagen!=null){
            return asset('imagenes/cursos/'.$this->imagen);
        }else{
            return asset('default.png');
        }
    }
}
