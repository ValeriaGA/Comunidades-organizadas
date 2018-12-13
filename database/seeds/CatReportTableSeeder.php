<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_report')->insert([
                ['name' => 'Otro'],
	            ['name' => 'Servicio'],
	            ['name' => 'Seguridad']
	    ]);
    }
}
