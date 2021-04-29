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