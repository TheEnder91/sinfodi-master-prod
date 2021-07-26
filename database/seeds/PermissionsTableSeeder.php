<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Estimulos\ObjetivosController;
use App\Http\Controllers\Estimulos\Factor2\MetasController;
use App\Http\Controllers\Estimulos\Factor2\ImpactosController;
use App\Http\Controllers\Estimulos\Factor3\DesempeñoController;
use App\Http\Controllers\Estimulos\Factor1\ActividadesAController;
use App\Http\Controllers\Estimulos\Factor1\ActividadesBController;
use App\Http\Controllers\Estimulos\Factor1\ResponsabilidadesController;

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
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['index']], ['description' => 'Visualizar listado de usuarios.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['show']], ['description' => 'Visualizar detalle de usuario.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['edit']], ['description' => 'Editar al usuario.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        /** Permisos para el catalogo de roles */
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['index']], ['description' => 'Visualizar listado de roles.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['create']], ['description' => 'Crear un nuevo rol.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['show']], ['description' => 'Visualizar detalle del rol.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        Permission::updateOrCreate(['name' => RolesController::PERMISSIONS['edit']], ['description' => 'Editar el rol.', 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        /** Permisos para el catalogo de permisos */
        Permission::updateOrCreate(['name' => PermissionController::PERMISSIONS['index']], ['description' => 'Visualizar listado de permisos.' , 'id_categoria' => 1, 'categoria' => 'Panel de control']);
        /** Permisos para el catalogo de objetivos */
        Permission::updateOrCreate(['name' => ObjetivosController::PERMISSIONS['index']], ['description' => 'Listado de objetivos.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ObjetivosController::PERMISSIONS['create']], ['description' => 'Nuevo objetivo.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ObjetivosController::PERMISSIONS['show']], ['description' => 'Detalle del objetivo.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ObjetivosController::PERMISSIONS['edit']], ['description' => 'Editar objetivo.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ObjetivosController::PERMISSIONS['delete']], ['description' => 'Eliminar objetivo.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de actividades A */
        Permission::updateOrCreate(['name' => ActividadesAController::PERMISSIONS['index']], ['description' => 'Listado Actividades A.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesAController::PERMISSIONS['create']], ['description' => 'Nuevo Actividades A.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesAController::PERMISSIONS['show']], ['description' => 'Detalle Actividades A.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesAController::PERMISSIONS['edit']], ['description' => 'Editar Actividades A.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesAController::PERMISSIONS['delete']], ['description' => 'Eliminar Actividades A.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de actividades B */
        Permission::updateOrCreate(['name' => ActividadesBController::PERMISSIONS['index']], ['description' => 'Listado Actividades B.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesBController::PERMISSIONS['create']], ['description' => 'Nuevo Actividades B.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesBController::PERMISSIONS['show']], ['description' => 'Detalle Actividades B.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesBController::PERMISSIONS['edit']], ['description' => 'Editar Actividades B.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ActividadesBController::PERMISSIONS['delete']], ['description' => 'Eliminar Actividades B.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de Nivel de responsabildad */
        Permission::updateOrCreate(['name' => ResponsabilidadesController::PERMISSIONS['index']], ['description' => 'Listado Nivel de Responsabilidad.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ResponsabilidadesController::PERMISSIONS['create']], ['description' => 'Nuevo Nivel de Responsabilidad.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ResponsabilidadesController::PERMISSIONS['show']], ['description' => 'Detalle Nivel de Responsabilidad.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ResponsabilidadesController::PERMISSIONS['edit']], ['description' => 'Editar Nivel de Responsabilidad.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ResponsabilidadesController::PERMISSIONS['delete']], ['description' => 'Eliminar Nivel de Responsabilidad.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de metas alcanzadas */
        Permission::updateOrCreate(['name' => MetasController::PERMISSIONS['index']], ['description' => 'Listado Factor por Meta Alcanzada.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => MetasController::PERMISSIONS['create']], ['description' => 'Nuevo Factor por Meta Alcanzada.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => MetasController::PERMISSIONS['show']], ['description' => 'Detalle Factor por Meta Alcanzada.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => MetasController::PERMISSIONS['edit']], ['description' => 'Editar Factor por Meta Alcanzada.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => MetasController::PERMISSIONS['delete']], ['description' => 'Eliminar Factor por Meta Alcanzada.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de Impacto */
        Permission::updateOrCreate(['name' => ImpactosController::PERMISSIONS['index']], ['description' => 'Listado Factor por Nivel de Impacto.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ImpactosController::PERMISSIONS['create']], ['description' => 'Nuevo Factor por Nivel de Impacto.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ImpactosController::PERMISSIONS['show']], ['description' => 'Detalle Factor por Nivel de Impacto.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ImpactosController::PERMISSIONS['edit']], ['description' => 'Editar Factor por Nivel de Impacto.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => ImpactosController::PERMISSIONS['delete']], ['description' => 'Eliminar Factor por Nivel de Impacto.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        // /** Permisos para el catalogo de Factor de desempeño */
        Permission::updateOrCreate(['name' => DesempeñoController::PERMISSIONS['index']], ['description' => 'Listado Factor por Desempeño.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => DesempeñoController::PERMISSIONS['create']], ['description' => 'Nuevo Factor por Desempeño.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => DesempeñoController::PERMISSIONS['show']], ['description' => 'Detalle Factor por Desempeño.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => DesempeñoController::PERMISSIONS['edit']], ['description' => 'Editar Factor por Desempeño.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
        Permission::updateOrCreate(['name' => DesempeñoController::PERMISSIONS['delete']], ['description' => 'Eliminar Factor por Desempeño.', 'id_categoria' => 2, 'categoria' => 'Estimulos']);
    }
}
