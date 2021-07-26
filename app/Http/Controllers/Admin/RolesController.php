<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    const PERMISSIONS = [
        'index' => 'admin-role-index',
        'create' => 'admin-role-create',
        'show' => 'admin-role-show',
        'edit' => 'admin-role-edit',
    ];

    public function index(){
        $roles = Role::all();
        return view('panelControl.role.index', [
            'rows' => $roles,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('panelControl.role.show', [
            'row' => $role,
            'catPermissions' => Permission::select('id_categoria', 'categoria')->distinct()->get(),
            'permissionsPanelControl' => Permission::where('id_categoria', 1)->get(),
            'permissionsEstimulos' => Permission::where('id_categoria', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panelControl.role.create', [
            'rows' => new Role(),
            'catPermissions' => Permission::select('id_categoria', 'categoria')->distinct()->get(),
            'permissionsPanelControl' => Permission::where('id_categoria', 1)->get(),
            'permissionsEstimulos' => Permission::where('id_categoria', 2)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $row = new Role($request->all());
            $row->save();
            $row->permissions()->sync($request->permission);
        }catch(\Throwable $th){
            DB::rollback();
            $status = 'error';
            $content = 'Se produjo un error al momento de registrar.';
        }
        return redirect()
            ->route('admin.role.create')
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $status = 'success';
        $content = 'Se realizo correctamente la actualización.';
        try{
            $role->fill($request->all())->save();
            $role->permissions()->sync($request->permission);
        }catch(\Throwable $th){
            DB::rollback();
            $status = 'error';
            $content = 'Se produjo un error al momento de actualizar.';
        }
        return redirect()
            ->route('admin.role.show', $role->id)
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ]);
    }
}
