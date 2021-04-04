<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businessman;
use App\Http\Requests\BusinessmanRequest;

class BusinessmansController extends Controller {
    public function index(){
    	$businessmans = Businessman::orderBy('id', 'desc')->get();

        foreach ($businessmans as $item)
            $item['business_dad'] = $item->find($item['id_business_dad']);
        
    	return response()->json($businessmans);
    }

    public function store(BusinessmanRequest $request) {

        /*if ($request->vaildate()->fails())
            return response()->json(['error' => 'teste'], 401);
        
        if(!$request->validated())
            return response()
        */
    	date_default_timezone_set('America/Sao_Paulo');

        $dataBusinessman = $request->all();

    	$dataBusinessman['registered_in'] = date("Y-m-d H:i:s");
        $businessman = Businessman::create($dataBusinessman);

        return response()->json([
            'message'=>'Businessman Created Successfully!!',
            'businessman'=>$businessman
        ]);
    }

    public function show($id) {
        //selecao da rede do empresario
        try{
            $businessman = Businessman::where('id', $id)->with('allSubBusinessmans')->firstOrFail();
        }catch(ModelNotFoundException $e){
            return response()->json(['error' => 'Empresário não encontrado!'], 404);
        }

        return response()->json($businessman);
    }

    public function update(Request $request, Businessman $businessman) {
        //no teste não pedia atualização de registro
    }

    public function destroy($id) {
        try{
            $businessman = Businessman::findOrFail($id)->delete();
        }catch(ModelNotFoundException $e){
            return response()->json(['error' => 'Empresário não encontrado!'], 404);
        }catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error'=> 'Algo deu errado, você pode está tentando apagar um registro que está relacionado com outro.']);
        }
        
        return response()->json([
            'message'=>'Businessman apagado com sucesso!!'
        ]);
    }
}
