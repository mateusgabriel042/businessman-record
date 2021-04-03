<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businessman;

class BusinessmansController extends Controller {
    public function index(){
    	$businessmans = Businessman::orderBy('id', 'desc')->get();

        foreach ($businessmans as $item)
            $item['business_dad'] = $item->find($item['id_business_dad']);
        
    	return response()->json($businessmans);
    }

    public function store(Request $request) {
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
        $businessman = Businessman::where('id', $id)->with('allSubBusinessmans')->first();
        return response()->json($businessman);
    }

    public function update(Request $request, Businessman $businessman) {
        $businessman->fill($request->post())->save();
        return response()->json([
            'message'=>'Businessman Updated Successfully!!',
            'businessman'=>$businessman
        ]);
    }

    public function destroy($id) {
        $businessman = Businessman::find($id)->delete();
        return response()->json([
            'message'=>'Businessman Deleted Successfully!!'
        ]);
    }
}
