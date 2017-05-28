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
        \DB::table('ciudades')->insert(['nombre_ciudad' => 'Bogotá']);
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
            'nombre_catalogo' => 'interior',
            'id_conjunto' => 1
        ]);
        \DB::table('catalogos')->insert([
            'nombre_catalogo' => 'apartamento',
            'id_conjunto' => 1
        ]);

        # CARGUE UBICACION CATALOGO
        for($i = 1; $i <= 8; $i++){
            \DB::table('ubicacion_catalogos')->insert(['nombre_ubicacion_catalogo' => $i,'id_catalogo' => 1 ]);
        }

        for($i = 1; $i <= 6; $i++){
            \DB::table('ubicacion_catalogos')->insert(['nombre_ubicacion_catalogo' => $i.'01' ,'id_catalogo' => 2 ]);
            \DB::table('ubicacion_catalogos')->insert(['nombre_ubicacion_catalogo' => $i.'02' ,'id_catalogo' => 2 ]);
            \DB::table('ubicacion_catalogos')->insert(['nombre_ubicacion_catalogo' => $i.'03' ,'id_catalogo' => 2 ]);
            \DB::table('ubicacion_catalogos')->insert(['nombre_ubicacion_catalogo' => $i.'04' ,'id_catalogo' => 2 ]);
        }


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
            'canal' => 'whatsapp',
            'id_conjunto' => 1
        ]);
        \DB::table('canal_comunicaciones')->insert([
            'indicativo' => '1',
            'canal' => 'correo',
            'id_conjunto' => 1
        ]);

        # CARGUE TIPO SALIDA
        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Fijo',
            'id_canal' => 1
        ]);

        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Movil',
            'id_canal' => 2
        ]);

        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'IP',
            'id_canal' => 3
        ]);
        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Wathsapp',
            'id_canal' => 4
        ]);
        \DB::table('tipo_salidas')->insert([
            'nombre_tipo_salida' => 'Correo',
            'id_canal' => 5
        ]);


        # CARGUE MODELOS
        #                    #SUPERADMINITRADOR
        \DB::table('modelos')->insert(['nombre_modelo' => 'canal_comunicaciones']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'catalogos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'ciudades']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'conjuntos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'estados']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'modelos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'modulos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'permisos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'permisos_por_rol']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'roles']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'tipo_saldas']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'ubicacion_catalogos']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'logs']);
        #ADMINISTRADOR
        \DB::table('modelos')->insert(['nombre_modelo' => 'usuario_extensiones']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'extensiones']);
                            #USURIO
        \DB::table('modelos')->insert(['nombre_modelo' => 'usuarios']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'marcados']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'historiales']);
        \DB::table('modelos')->insert(['nombre_modelo' => 'notificaciones']);

        # CARGUE ESTADOS
        \DB::table('estados')->insert([
            'nombre_estado' => 'activo'
        ]);
        \DB::table('estados')->insert([
            'nombre_estado' => 'inactivo',
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
        \DB::table('roles')->insert(['nombre_rol' => 'SuperAdministrador']);
        \DB::table('roles')->insert(['nombre_rol' => 'Administrador']);
        \DB::table('roles')->insert(['nombre_rol' => 'Usuario']);

        # CARGUE PERMISOS
        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Creacion',
            'id_roles' => '.',
            'id_estado' => 1
        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Lectura',
            'id_roles' => '.',
            'id_estado' => 1        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Modificacion',
            'id_roles' => '.',
            'id_estado' => 1
        ]);

        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Eliminacion',
            'id_roles' => '.',
            'id_estado' => 1
        ]);
        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Mi Lectura',
            'id_roles' => '.',
            'id_estado' => 1
        ]);
        \DB::table('permisos')->insert([
            'nombre_permiso' => 'Mi Modificacion',
            'id_roles' => '.',
            'id_estado' => 1
        ]);

        # CARGUE PERMISOS_POR_ROL SUPERADMINISTRADOR
        for($i = 1; $i <= 19; $i++){
            \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 1,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 2,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 3,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 1,'id_permiso' => 4,'id_modelo' => $i]);
        }
        # CARGUE PERMISOS_POR_ROL ADMINISTRADOR
        for($i = 14; $i <= 19; $i++){
            \DB::table('permisos_por_rol')->insert(['id_rol' => 2,'id_permiso' => 1,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 2,'id_permiso' => 2,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 2,'id_permiso' => 3,'id_modelo' => $i]);
            \DB::table('permisos_por_rol')->insert(['id_rol' => 2,'id_permiso' => 4,'id_modelo' => $i]);
        }

        # CARGUE PERMISOS_POR_ROL tTODOS LOS ROLES, MI-USUARIO
        for($i = 1; $i <= 3; $i++)
        {
            DB::table('permisos_por_rol')->insert(['id_rol' => $i,'id_permiso' => 5,'id_modelo' => 16]);
            DB::table('permisos_por_rol')->insert(['id_rol' => $i,'id_permiso' => 6,'id_modelo' => 16]);
            DB::table('permisos_por_rol')->insert(['id_rol' => $i,'id_permiso' => 5,'id_modelo' => 17]);
            DB::table('permisos_por_rol')->insert(['id_rol' => $i,'id_permiso' => 5,'id_modelo' => 18]);
            DB::table('permisos_por_rol')->insert(['id_rol' => $i,'id_permiso' => 5,'id_modelo' => 19]);
        }


        # CARGUE USUARIOS
        \DB::table('usuarios')->insert([
            'nombres' => 'super admin',
            'apellidos' => 'super admin___',
            'email' => 'superAdmin@demo.com',
            'identificacion' => '98765432112345678',
            'id_rol' => 1,
            'id_conjunto' => 1
        ]);
        \DB::table('usuarios')->insert([
            'nombres' => 'admin',
            'apellidos' => 'virtual phone',
            'email' => 'admin@demo.com',
            'identificacion' => '98765432112345678',
            'id_rol' => 2,
            'id_conjunto' => 1
        ]);
        \DB::table('usuarios')->insert([
            'nombres' => 'user',
            'apellidos' => 'virtual phone',
            'email' => 'user@demo.com',
            'identificacion' => '98765432112345678',
            'id_rol' => 3,
            'id_conjunto' => 1
        ]);

        # CARGUE USER
        \DB::table('users')->insert([
            'name' => 'super admin',
            'email' => 'superAdmin@demo.com',
            'password' => bcrypt(12345678),
            'contador_contrasenia' => 0,
            'is_estado_contrasenia' => 1,
            'id_usuario' => 1
        ]);
        \DB::table('users')->insert([
            'name' => 'adminn',
            'email' => 'admin@demo.com',
            'password' => bcrypt(12345678),
            'contador_contrasenia' => 0,
            'is_estado_contrasenia' => 1,
            'id_usuario' => 2
        ]);
        \DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@demo.com',
            'password' => bcrypt(12345678),
            'contador_contrasenia' => 0,
            'is_estado_contrasenia' => 1,
            'id_usuario' => 3
        ]);

        # CARGUE CLIENTE
        \DB::table('oauth_clients')->insert([
            'id' => 'f3d259ddd3ed8ff3843839b',
            'secret' => '4c7f6f8fa93d59c45502c0ae8c4a95b',
            'name' => 'Main website'
        ]);
    }
}
