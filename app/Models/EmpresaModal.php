<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaModal extends Model
{
    use HasFactory;
    protected $table = "TBL_EMPRESA";
    //para guardar los cambios por fechas 
    public $timestamps = true;
    protected $fillable = [
        "razon_social",
        "nit",
        "digito_verificacion_nit",
        "logo",
        "direccion",
        "telefono",
        "correo",
        "contrasena",
        "borrado",
        "created_at",
        "updated_at",
        "pais",
        "ciudad",
    ];
    protected $hidden =["contrasena"];
}

