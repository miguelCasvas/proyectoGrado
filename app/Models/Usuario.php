<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    public $timestamps = false;

    protected $fillable = ["nombre_usuario", "apellidos", "email", "identificacion", "fecha_nacimiento", "id_role", "id_conjunto", "id_canal"];

}
