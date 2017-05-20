<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    public $timestamps = false;
    protected $table = "roles";
    protected $primaryKey = "id_role";

    protected $fillable = ["nombre_role"];
}
