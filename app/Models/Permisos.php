<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    //
    public $timestamps = false;
    protected $table = "permisos";
    protected $primaryKey = "id_permisos";

    protected $fillable = ["nombre_permiso", "id_roles", "id_estado", "id_role"];
}
