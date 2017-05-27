<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";

    protected $primaryKey = "id_usuario";

    protected $fillable = ["nombres", "apellidos", "email", "identificacion", "fecha_nacimiento", "id_rol", "id_conjunto"];

    /**
     * Relacion con modelo canal_comunicaciones Uno a Muchos [usuarios(1) --fk--> canal_comunicaciones(*)]
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canalComunicacion()
    {
        return $this->hasMany(\App\Models\CanalComunicacion::class, 'id_usuario', 'id_usuario');
    }

}
