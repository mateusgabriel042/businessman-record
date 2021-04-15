<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessmanRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'full_name'     => 'required|min:9|max:200',
            'cell_phone'    => 'required|min:14|max:15|unique:businessmans,cell_phone,'.$this->id,
            'uf_state'      => 'required|min:2|max:2',
            'city'          => 'required|min:3|max:50'
        ];
    }

    public function messages(){
        return [
            'full_name.required' => 'O campo Nome é obrigatório!',
            'full_name.min' => 'O campo Nome deve ter no mínimo 9 caracteres!',
            'full_name.max' => 'O campo Nome deve ter no maximo 200 caracteres!',

            'cell_phone.required' => 'O campo Celular é obrigatório!',
            'cell_phone.min' => 'O campo Celular deve ter no mínimo 14 caracteres!',
            'cell_phone.max' => 'O campo Celular deve ter no maximo 15 caracteres!',
            'cell_phone.unique' => 'Já existe uma pessoa cadastrada com esse Celular!',

            'uf_state.required' => 'O campo Estado é obrigatório!',
            'uf_state.min' => 'O campo Estado deve ter no mínimo 2 caracteres!',
            'uf_state.max' => 'O campo Estado deve ter no maximo 2 caracteres!',

            'city.required' => 'O campo Cidade é obrigatório!',
            'city.min' => 'O campo Cidade deve ter no mínimo 3 caracteres!',
            'city.max' => 'O campo Cidade deve ter no maximo 50 caracteres!',
        ];
    }
}
