<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PermissionController;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Permisos para el catalogo de usuarios */
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['index']], ['description' => 'Visualizar listado de usuarios.', 'categoria' => 'Usuario']);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['show']], ['description' => 'Visualizar detalle de usuario.', 'categoria' => 'Usuario']);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['edit']], ['description' => 'Editar al usuario.', 'categoria' => 'Usuario']);
        /** Permisos para el catalogo de roles */
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['index']], ['description' => 'Visualizar listado de roles.', 'categoria' => 'Roles']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['create']], ['description' => 'Crear un nuevo rol.', 'categoria' => 'Roles']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['show']], ['description' => 'Visualizar detalle del rol.', 'categoria' => 'Roles']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['edit']], ['description' => 'Editar el rol.', 'categoria' => 'Roles']);
        /** Permisos para el catalogo de permisos */
        Permission::updateOrCreate(['name' => PermissionController::PERMISSIONS['index']], ['description' => 'Visualizar listado de permisos.' , 'categoria' => 'Permisos']);
    }
}
