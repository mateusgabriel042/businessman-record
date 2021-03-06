<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Businessman;

class BusinessmansTableSeeder extends Seeder {
    public function run(){
    	//definindo o horario local na aplicacao
        date_default_timezone_set('America/Sao_Paulo');

        //registrando empresários (teste)
    	Businessman::create([
    		'id'			  => 1,
            'full_name'       => 'Fulano de Tal',
            'cell_phone'      => '(49) 98541-4569',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'           => 'Santa Catarina',
            'uf_state'		  => 'SC',
            'id_city'         => 1,
            'city'			  => 'Chapecó',
            'id_business_dad' => null            
        ]);

        Businessman::create([
        	'id'			  => 2,
            'full_name'       => 'Beltrano Tomé',
            'cell_phone'      => '(48) 99876-4239',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'			  => 'Santa Catarina',
            'uf_state'        => 'SC',
            'id_city'         => 1,
            'city'			  => 'Itajaí',
            'id_business_dad' => 1
        ]);

        Businessman::create([
        	'id'			  => 3,
            'full_name'       => 'Pedro Pederneiras',
            'cell_phone'      => '(21) 98541-4123',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'           => 'Rio de Janeiro',
            'uf_state'		  => 'RJ',
            'id_city'         => 1,
            'city'			  => 'Niterói',
            'id_business_dad' => 1
        ]);

        Businessman::create([
        	'id'			  => 4,
            'full_name'       => 'José das Dores',
            'cell_phone'      => '(11) 98221-1129 ',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'           => 'São Paulo',
            'uf_state'		  => 'SP',
            'id_city'         => 1,
            'city'			  => 'Osasco',
            'id_business_dad' => 3
        ]);

        Businessman::create([
        	'id'			  => 5,
            'full_name'       => 'Zézinho dos Codes',
            'cell_phone'      => '(91) 98541-4529',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'           => 'Pará',
            'uf_state'			  => 'PA',
            'id_city'         => 1,
            'city'			  => 'Belem',
            'id_business_dad' => 1
        ]);

        Businessman::create([
        	'id'			  => 6,
            'full_name'       => 'Maria Recursiva',
            'cell_phone'      => '(47) 96812-8765',
            'registered_in'   => date("Y-m-d H:i:s"),
            'id_state'        => 1,
            'state'           => 'Santa Catarina',
            'uf_state'		  => 'SC',
            'id_city'         => 1,
            'city'			  => 'Blumenau',
            'id_business_dad' => 4
        ]);
    }
}