<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion_EstudianteModal extends Model
{
    use HasFactory;
    protected $table = "TBL_PROFESION_ESTUDIANTE";
    public $timestamps = true;
    protected $fillable =[
        "ID_estudiante",
        "ID_profesion",
        "Numero_semestres",
        "borrado",
        "created_at",
        "updated_at"
    ];
}
