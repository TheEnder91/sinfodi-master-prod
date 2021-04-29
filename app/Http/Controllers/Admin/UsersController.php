<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    const PERMISSIONS = [
        'index' => 'admin-user-index',
        'show' => 'admin-user-show',
        'edit' => 'admin-user-edit',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('panelControl.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('panelControl.users.show', [
            'row' => $user,
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $status = 'success';
        $content = 'Exito al actualizar el usuario.';
        try{
            $user->fill($request->all())->save();
            $user->syncRoles($request->rol);
        }catch(\Throwable $th){
            DB::rollback();
            $status = 'error';
            $content = 'Se produjo un error al momento de actualizar.';
        }
        return redirect()
            ->route('admin.user.show', $user->id)
            ->with('process_result', [
                'status' => $status,
                'content' => $content,
            ]);
    }
}
