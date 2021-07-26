<?php

use App\Models\Admin\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('public/login/{user}', function(){
    $username = request()->user;
    $existeUser = DB::table('users')->select('username')->where('username', '=', $username)->get();
    if(count($existeUser) >= 1){
        if(Auth::attempt(['username' => $username, 'password' => $username])){
            request()->session()->regenerate();
            return redirect('welcome');
        }
    }else{
        $saveUser = new User();
        $saveUser->username = $username;
        $saveUser->password = bcrypt($username);
        $saveUser->save();
        if(Auth::attempt(['username' => $username, 'password' => $username])){
            request()->session()->regenerate();
            return redirect('welcome');
        }
    }
    return 'Lo sentimos pero no se encuentra registrado en nuestro sistema';
});

Route::get('welcome', 'WelcomeController')->name('welcome');

Route::prefix('panel_control')->namespace('Admin')->name('admin.')->group(function () {
    /** Rutas para el catalogo de usuarios */
    Route::resource('usuarios', 'UsersController')->names('user')->parameters(['usuarios' => 'user'])->only(['index', 'show', 'update']);
    /** Rutas para el catalogo de roles */
    Route::resource('roles', 'RolesController')->names('role')->parameters(['roles' => 'role'])->except(['edit', 'destroy']);
    /** Rutas para el catalogo de permisos */
    Route::resource('permisos', 'PermissionController')->names('permission')->parameters(['permisos' => 'permission'])->only(['index']);
});

Route::prefix('estimulos')->namespace('Estimulos')->name('estimulo.')->group(function(){
    /** Rutas para el catalogo de objetivos */
    Route::resource('objetivos', 'ObjetivosController')->names('configuracion.objetivo')->parameters(['objetivos' => 'objetivo'])->except(['create', 'show']);
    Route::get('tblObjetivos', 'ObjetivosController@tabla')->name('tblObjetivos');
    /** Rutas para el catalogo de Actividades A... */
    Route::resource('actividadesA', 'Factor1\ActividadesAController')->names('configuracion.factor1.actividadA')->parameters(['actividadesA' => 'actividadA'])->except(['create', 'show']);
    Route::get('tblActividadesA', 'Factor1\ActividadesAController@tablaActividadesA');
    /** Rutas para el catalogo de Actividades B... */
    Route::resource('actividadesB', 'Factor1\ActividadesBController')->names('configuracion.factor1.actividadB')->parameters(['actividadesB' => 'actividadB'])->except(['create', 'show']);
    Route::get('tblActividadesB', 'Factor1\ActividadesBController@tablaActividadesB');
});
