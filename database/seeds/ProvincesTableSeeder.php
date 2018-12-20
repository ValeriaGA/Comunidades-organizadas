<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$costa_rica = DB::table('countries')->where('name', 'LIKE', 'Costa Rica')->first();
        DB::table('provinces')->insert([
                [
                	'name' => 'San José',
                	'country_id' => $costa_rica->id
				],
				[
                	'name' => 'Alajuela',
                	'country_id' => $costa_rica->id
            	],
                [
                	'name' => 'Heredia',
                	'country_id' => $costa_rica->id
            	],
                [
                	'name' => 'Cartago',
                	'country_id' => $costa_rica->id
            	],
                [
                	'name' => 'Guanacaste',
                	'country_id' => $costa_rica->id
            	],
                [
                	'name' => 'Puntarenas',
                	'country_id' => $costa_rica->id
            	],
                [
                	'name' => 'Limón',
                	'country_id' => $costa_rica->id
            	],
	    ]);
    }
}
