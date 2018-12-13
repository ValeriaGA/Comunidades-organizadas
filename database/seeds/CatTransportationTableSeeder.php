<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatTransportationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('cat_transportation')->insert([
                ['name' => 'Sin vehiculo'],
	            ['name' => 'Motocicleta'],
	            ['name' => 'Carro'],
	            ['name' => 'Bicicleta'],
	            ['name' => 'Camion'],
	            ['name' => 'Buseta'],
	    ]);

    }
}