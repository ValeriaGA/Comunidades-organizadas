<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
	            	['name' => 'Verificado'],
                    ['name' => 'Sospechoso'],
                    ['name' => 'Sin Procesar'],
	            	['name' => 'Procesando'],
                    ['name' => 'Procesado']
	            ]);
    }
}
