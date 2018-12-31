<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatEvidenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_evidence')->insert([
                ['name' => 'Imagen'],
	            ['name' => 'Audio'],
	            ['name' => 'Video'],
	            ['name' => 'Documento']
	    ]);
    }
}
