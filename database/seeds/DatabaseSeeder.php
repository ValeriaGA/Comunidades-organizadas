<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	RolesTableSeeder::class,
            GenderTableSeeder::class,
            PeopleTableSeeder::class,
        	UsersTableSeeder::class,

        	CatReportTableSeeder::class,
        	SubCatReportTableSeeder::class,

        	// empty {
            CountriesTableSeeder::class,
        	ProvincesTableSeeder::class,
        	CantonsTableSeeder::class,
        	DistrictsTableSeeder::class,
        	// }

        	CatTransportationTableSeeder::class,
        	CatWeaponTableSeeder::class,
        	CatEvidenceTableSeeder::class,
            StatesTableSeeder::class,
            CatRequestStateTableSeeder::class
        ]);
    }
}
