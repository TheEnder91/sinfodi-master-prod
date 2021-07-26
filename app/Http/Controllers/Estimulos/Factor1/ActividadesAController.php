<?php

namespace App\Http\Controllers\Estimulos\Factor1;

use Illuminate\Http\Request;
use App\Models\Estimulos\Criterio;
use App\Models\Estimulos\Objetivo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ActividadesAController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-actividadA-index',
        'create' => 'estimulo-actividadA-create',
        'show' => 'estimulo-actividadA-show',
        'edit' => 'estimulo-actividadA-edit',
        'delete' => 'estimulo-actividadA-delete',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetivos = Objetivo::all();
        return view('estimulos.factores.factor1.actividadesA.index', compact('objetivos'));
    }

    public function tablaActividadesA(){
        $datos = Criterio::all()->where('observaciones', '=', 'Tabla 1. Actividad A.');
        return view('estimulos.factores.factor1.actividadesA.tabla', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'id_objetivo' => 'required',
            'puntos' => 'required',
        ];

        $this->validate($request, $rules);

        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $nuevo = new Criterio();
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
        $datos = Criterio::findOrFail($id);
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
        $actualizar = Criterio::findOrFail($id);
        if($actualizar->update($request->all())){
            return response()->json(['exito']);
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
