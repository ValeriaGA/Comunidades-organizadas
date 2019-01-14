<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatRequestStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_request_state')->insert([
	            	['name' => 'Pendiente'],
                    ['name' => 'Aprobada'],
                    ['name' => 'Rechazada']
	            ]);
    }
}
