<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposSalidas extends Model
{
    //
    public $timestamps = false;
    protected $table = "tipo_salida";
    protected $primaryKey = "id_tipo_salida";

    protected $fillable = ["nombre_tipo_salida", "id_marcado", "id_notificacion"];
}
