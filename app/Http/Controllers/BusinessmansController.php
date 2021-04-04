<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businessman;
use App\Http\Requests\BusinessmanRequest;

class BusinessmansController extends Controller {
    public function index(){
        //busca uma lista de empresarios ordenada pelo id de forma decrecente
    	$businessmans = Businessman::orderBy('id', 'desc')->get();

        //insere nos item do array o pai empresarial referente ao id relacionado
        foreach ($businessmans as $item)
            $item['business_dad'] = $item->find($item['id_business_dad']);
        
        //retorno em JSON da lista de empresarios
    	return response()->json($businessmans);
    }

    public function store(BusinessmanRequest $request) {
        //atualiza o horario local para o horario de São Paulo
    	date_default_timezone_set('America/Sao_Paulo');

        //obtendo a requisicao dos dados para o registro
        $dataBusinessman = $request->all();

        //inserindo a data e hora do registro
    	$dataBusinessman['registered_in'] = date("Y-m-d H:i:s");

        //realizando o registro
        $businessman = Businessman::create($dataBusinessman);

        //retornando uma resposta em JSON ao criar o registro 
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

        //retornan em JSON a redo do empresario
        return response()->json($businessman);
    }

    public function update(Request $request, Businessman $businessman) {
        //no teste não pedia atualização de registro
    }

    public function destroy($id) {

        try{
            //buscando e deletando o empresario
            $businessman = Businessman::findOrFail($id)->delete();
        }catch(ModelNotFoundException $e){
            //retorno de erro caso o empresario nao seja emcontrado
            return response()->json(['error' => 'Empresário não encontrado!'], 404);
        }catch (\Illuminate\Database\QueryException $e) {
            //retornando erro caso ocorra algum erro ao excluir o empresario
            return response()->json(['error'=> 'Algo deu errado, você pode está tentando apagar um registro que está relacionado com outro.']);
        }
        
        //resposta em JSON caso a exclusao seja bem sussedida
        return response()->json([
            'message'=>'Businessman apagado com sucesso!!'
        ]);
    }
}
