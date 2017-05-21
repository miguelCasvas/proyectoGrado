<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
    private $table = "ciudades";

    protected $primaryKey = "id_ciudad";

    protected $fillable = ["nombre_ciudad"];
}
