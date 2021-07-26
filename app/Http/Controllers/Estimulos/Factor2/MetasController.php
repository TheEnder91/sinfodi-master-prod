<?php

namespace App\Http\Controllers\Estimulos\Factor2;

use Illuminate\Http\Request;
use App\Models\Estimulos\Meta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MetasController extends Controller
{
    const PERMISSIONS = [
        'index' => 'estimulo-meta-index',
        'create' => 'estimulo-meta-create',
        'show' => 'estimulo-meta-show',
        'edit' => 'estimulo-meta-edit',
        'delete' => 'estimulo-meta-delete',
    ];

    public function index(){
        return view('estimulos.factores.factor2.metas.index');
    }

    /** Codigo personal... */
    public function tablaMetas(){
        $metas = Meta::all();
        return view('estimulos.factores.factor2.metas.tabla', compact('metas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = [
            'cumplimiento' => 'required',
            'f2' => 'required',
        ];

        $this->validate($request, $rules);

        $status = 'success';
        $content = 'Se agrego correctamente el registro.';
        try{
            $nuevo = new Meta();
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
        $datos = Meta::findOrFail($id);
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
        $actualizar = Meta::findOrFail($id);
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
