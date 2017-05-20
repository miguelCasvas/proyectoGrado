<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    //
    public $timestamps = false;
    protected $table = "estados";
    protected $primaryKey = "id_estado";

    protected $fillable = ["nombre_estado", "id_modulo"];
}
