<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
	            'name' => 'admin',
	            'last_name' => 'Q',
	            'second_last_name' => 'A',
	            'official_id' => '0',
	            'gender' => 'm',
	            'foreigner' => TRUE,
	    ]);
    }
}
