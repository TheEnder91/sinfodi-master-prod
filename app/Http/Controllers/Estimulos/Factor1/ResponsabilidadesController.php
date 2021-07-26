<?php

namespace App\Http\Controllers\Estimulos\Factor1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Estimulos\Responsabilidad;

class ResponsabilidadesController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-responsabilidad-index',
        'create' => 'estimulo-responsabilidad-create',
        'show' => 'estimulo-responsabilidad-show',
        'edit' => 'estimulo-responsabilidad-edit',
        'delete' => 'estimulo-responsabilidad-delete',
    ];

    public function index(){
        return view('estimulos.factores.factor1.responsabilidades.index');
    }

    public function tablaResponsabilidades(){
        $responsabilidades = Responsabilidad::all();
        return view('estimulos.factores.factor1.responsabilidades.tabla', compact('responsabilidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'nombre' => 'required',
            'puntos' => 'required',
        ];

        $this->validate($request, $rules);

        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $nuevo = new Responsabilidad();
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
        $datos = Responsabilidad::findOrFail($id);
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
        $actualizar = Responsabilidad::findOrFail($id);
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
