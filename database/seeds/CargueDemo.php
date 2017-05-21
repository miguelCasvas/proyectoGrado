<?php

use Illuminate\Database\Seeder;

class CargueDemo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # CARGUE DE CIUDADES
        \DB::table('ciudades')->insert(['nombre_ciudad' => 'Bogotá DC.']);
        \DB::table('ciudades')->insert(['nombre_ciudad' => 'Cali']);

        # CARGUE CONJUNTO
        \DB::table('conjuntos')->insert([
            'nombre_conjunto' => 'demo conjunto',
            'direccion' => 'calle falsa 123',
            'email' => 'email@demo.com',
            'telefono' => '87654321',
            'id_ciudad' => 1
        ]);

        # CARGUE CATALOGO
        \DB::table('catalogos')->insert([
            'nombre_catalogo' => 'demo catalogo',
            'id_conjunto' => 1
        ]);

        # CARGUE UBICACION CATALOGO
        \DB::table('ubicacion_catalogos')->insert([
            'nombre_ubicacion_catalogo' => 'demo ubicacion catalogo',
            'id_catalogo' => 1
        ]);

        # CARGUE CANAL COMUNICACION
        \DB::table('canal_comunicaciones')->insert([
            'indicativo' => '1',
            'canal' => 'fijo',
            'id_conjunto' => 1
        ]);

        \DB::table('canal_comunicaciones')->insert([
            'indicativo' => '1',
            'canal' => 'movil',
            'id_conjunto' => 1
        ]);

        \DB::table('canal_comunicaciones')->insert([
            'indicativo' => '1',
            'canal' => 'sip',
            'id_conjunto' => 1
        ]);

        \DB::table('canal_comunicaciones')->insert([
            'indicativo' => '1',
            'canal' => 'aplicacion',
            'id_conjunto' => 1
        ]);

        # CARGUE TIPO SALIDA
        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Claro',
            'id_canal' => 1
        ]);

        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Movistar',
            'id_canal' => 1
        ]);

        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Tigo',
            'id_canal' => 1
        ]);

        # CARGUE MODULOS
        \DB::table('modulos')->insert(['nombre_modulo' => 'extensiones']);
        \DB::table('modulos')->insert(['nombre_modulo' => 'permisos']);

        # CARGUE ESTADOS
        \DB::table('estados')->insert([
            'nombre_estado' => 'activo',
            'id_modulo' => 1 #Extensiones
        ]);

        \DB::table('estados')->insert([
            'nombre_estado' => 'activo',
            'id_modulo' => 2 #Permisos
        ]);

        # CARGUE EXTENSIONES
        \DB::table('extensiones')->insert([
            'extension' => 1233,
            'id_conjunto' => 1,
            'id_estado' => 1
        ]);

        # CARGUE MARCADOS
        \DB::table('marcados')->insert([
            'secuencia_marcado' => 1,
            'id_extension' => 1,
            'id_tipo_salida' => 1
        ]);

        # CARGUE ROLES
        \DB::table('roles')->insert(['nombre_rol' => 'superadmin']);

        # CARGUE PERMISOS
        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Creacion',
            'id_roles' => '.',
            'id_estado' => 2
        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Lectura',
            'id_roles' => '.',
            'id_estado' => 2
        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Modificacion',
            'id_roles' => '.',
            'id_estado' => 2
        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Eliminacion',
            'id_roles' => '.',
            'id_estado' => 2
        ]);

        # CARGUE PERMISOS_POR_ROL
        \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 1]);
        \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 2]);
        \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 3]);
        \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 4]);

        # CARGUE USUARIOS
        \DB::table('usuarios')->insert([
            'nombres' => 'super admin',
            'apellidos' => 'super admin___',
            'email' => 'superAdmin@demo.com',
            'identificacion' => '98765432112345678',
            'id_rol' => 1,
            'id_conjunto' => 1
        ]);

        # CARGUE CLIENTE
        \DB::table('oauth_clients')->insert([
            'id' => 'f3d259ddd3ed8ff3843839b',
            'secret' => '4c7f6f8fa93d59c45502c0ae8c4a95b',
            'name' => 'Main website'
        ]);
    }
}
