<?php

namespace App\Http\Controllers\Estimulos\Factor2;

use Illuminate\Http\Request;
use App\Models\Estimulos\Impacto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ImpactosController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-impacto-index',
        'create' => 'estimulo-impacto-create',
        'show' => 'estimulo-impacto-show',
        'edit' => 'estimulo-impacto-edit',
        'delete' => 'estimulo-impacto-delete',
    ];

    public function index(){
        return view('estimulos.factores.factor2.impacto.index');
    }

    /** Codigo personal... */
    public function tablaImpacto(){
        $impacto = Impacto::all();
        return view('estimulos.factores.factor2.impacto.tabla', compact('impacto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'factor' => 'required',
            'nivel' => 'required',
        ];

        $this->validate($request, $rules);

        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $nuevo = new Impacto();
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
        $datos = Impacto::findOrFail($id);
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
        $actualizar = Impacto::findOrFail($id);
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
