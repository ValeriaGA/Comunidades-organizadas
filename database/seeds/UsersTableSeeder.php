<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = DB::table('people')->where('name', 'LIKE', 'admin')->get();
    	$admin_role = DB::table('roles')->where('name', 'LIKE', 'Administrador')->get();

	    DB::table('users')->insert([
	            'email' => 'admin@localhost.com',
	            'email_verified_at' => now(),
	            'password' => bcrypt('secret'),
	            'remember_token' => str_random(10),
	            'avatar_path' => NULL,
	            'person_id' => $admin[0]->id,
	            'role_id' => $admin_role[0]->id
	    ]);
    }
}
