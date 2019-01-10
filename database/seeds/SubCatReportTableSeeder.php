<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCatReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$otro = DB::table('cat_report')->where('name', 'LIKE', 'Servicio')->get();
    	$service = DB::table('cat_report')->where('name', 'LIKE', 'Servicio')->get();
    	$security = DB::table('cat_report')->where('name', 'LIKE', 'Seguridad')->get();
        DB::table('sub_cat_report')->insert([

        		// Otro
        		[
        			'name' => 'Otro',
	            	'cat_report_id' => $otro[0]->id,
	            	'multimedia_path' => 'other_small.png'
        		],

        		// Servicios publicos
	            [
	            	'name' => 'Agua',
	            	'cat_report_id' => $service[0]->id,
	            	'multimedia_path' => 'water_small.png'
	            ],
	            [
	            	'name' => 'Luz',
	            	'cat_report_id' => $service[0]->id,
	            	'multimedia_path' => 'light_small.png'
	            ],
	            [
	            	'name' => 'Basura',
	            	'cat_report_id' => $service[0]->id,
	            	'multimedia_path' => 'trash_small.png'
	            ],
	            [
	            	'name' => 'Calle',
	            	'cat_report_id' => $service[0]->id,
	            	'multimedia_path' => 'road_small.png'
	            ],

	            // Seguridad
	            [
	            	'name' => 'Asalto',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'assault_small.png'
	            ],
	            [
	            	'name' => 'Robo de Autos',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'autotheft_small.png'
	            ],
	            [
	            	'name' => 'Robo',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'burglary_small.png'
	            ],
	            [
	            	'name' => 'Robo de Tienda',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'shoplifting_small.png'
	            ],
	            [
	            	'name' => 'Actividades Sospechosas',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'suspactivity_small.png'
	            ],
	            [
	            	'name' => 'Homicidio',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'homicide_small.png'
	            ],
	            [
	            	'name' => 'Vandalismo',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'vandalism_small.png'
	            ],
	            [
	            	'name' => 'Drogas',
	            	'cat_report_id' => $security[0]->id,
	            	'multimedia_path' => 'drugs_small.png'
	            ]
	    ]);
    }
}