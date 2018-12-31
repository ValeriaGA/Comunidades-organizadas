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
        $gender = DB::table('genders')->where('name', 'LIKE', 'Masculino')->get();
        DB::table('people')->insert([
	            'name' => 'admin',
	            'last_name' => 'Q',
	            'second_last_name' => 'A',
	            'official_id' => '0',
	            'gender_id' => $gender[0]->id,
	            'foreigner' => TRUE,
	    ]);
    }
}
