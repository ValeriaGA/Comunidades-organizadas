<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
	            	['name' => 'Masculino'],
	            	['name' => 'Femenino'],
                    ['name' => 'Otro']
	            ]);
    }
}
