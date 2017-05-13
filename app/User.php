<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'contador_contrasenia', 'is_estado_contrasenia', 'id_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Encriptacion de contraseña antes de generar Insercion o actualizacion de registro
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function errorContrasenia()
    {
        //$model = user::find($id);
        $this->contador_contrasenia = $this->contador_contrasenia + 1;
        $this->save();

        return $this->contador_contrasenia;
    }

    public function busquedaPorEmail($email)
    {
        $model = user::where('email', $email);

        if ($model != null)
            return $model;
        else
            return false;
    }
}
