<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteModal extends Model
{
    use HasFactory;
    protected $table = "TBL_ESTUDIANTE";
    public $timestamps = true;
    protected $fillable =[
        "id_UPB",
        "nombre",
        "apellido",
        "correo",
        "telefono",
        "pais",
        "ciudad",
        "contrasena",
        "borrado",
        "created_at",
        "updated_at",
    ];
    protected $hidden =["contrasena"];
    
}
