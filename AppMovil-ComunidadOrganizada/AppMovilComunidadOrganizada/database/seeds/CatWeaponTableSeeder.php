<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatWeaponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_weapon')->insert([
                ['name' => 'No Aplica'],
	            ['name' => 'Blancas'],
	            ['name' => 'Contundentes'],
	            ['name' => 'Arrojadizas'],
	            ['name' => 'Proyeccion'],
	            ['name' => 'Fuego'],
	            ['name' => 'Bomba']
	    ]);
    }
}