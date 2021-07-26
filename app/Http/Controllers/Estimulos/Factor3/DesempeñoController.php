<?php

namespace App\Http\Controllers\Estimulos\Factor3;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estimulos\Desempeño;
use App\Http\Controllers\Controller;

class DesempeñoController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-desempeño-index',
        'create' => 'estimulo-desempeño-create',
        'show' => 'estimulo-desempeño-show',
        'edit' => 'estimulo-desempeño-edit',
        'delete' => 'estimulo-desempeño-delete',
    ];

    public function index(){
        return view('estimulos.factores.factor3.desempeño.index');
    }

    /** Codigo personal... */
    public function tablaDesempeño(){
        $desempeño = Desempeño::all();
        return view('estimulos.factores.factor3.desempeño.tabla' , compact('desempeño'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'resultados' => 'required',
            'f3' => 'required',
        ];

        $this->validate($request, $rules);

        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $nuevo = new Desempeño();
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
        $datos = Desempeño::findOrFail($id);
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
        $actualizar = Desempeño::findOrFail($id);
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
