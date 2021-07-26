<?php

namespace App\Http\Controllers\Estimulos;

use Illuminate\Http\Request;
use App\Models\Estimulos\Objetivo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ObjetivosController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-objetivo-index',
        'create' => 'estimulo-objetivo-create',
        'show' => 'estimulo-objetivo-show',
        'edit' => 'estimulo-objetivo-edit',
        'delete' => 'estimulo-objetivo-delete',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estimulos.objetivos.index');
    }

    /** Codigo personal... */
    public function tabla(){
        $datos = Objetivo::all();
        return view('estimulos.objetivos.tabla', compact('datos'));
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
            $nuevo = new objetivo();
            $nuevo->create($request->all());
        }catch(\Throwable $th){
            DB::rollback();
            $status = 'error';
            $content = 'Se produjo un error al momento de registrar.';
        }
        return back()
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = objetivo::findOrFail($id);
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = objetivo::findOrFail($id);
        if($datos->update(['nombre'=>$request->nombre])){
            return response()->json('exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
