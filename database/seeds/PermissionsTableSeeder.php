<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\UsersController;

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
    }
}
