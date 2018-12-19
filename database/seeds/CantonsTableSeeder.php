<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Province;

class CantonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vo
     */
    public function run()
    {
    	$provinces = Province::all();
    	$provinces_ids = array();
    	foreach ($provinces as $province)
    	{
    		$provinces_ids[$province->name] = $province->id;
    	}

        DB::table('cantons')->insert([
        		// San José
                [ 'name' => 'San José', 'province_id' => $provinces_ids['San José']],
            	[ 'name' => 'Acosta', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Alajuelita', 'province_id' => $provinces_ids['San José']],
            	[ 'name' => 'Aserrí', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Curridabat', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Desamparados', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Dota', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Escazú', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Goicoechea', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'León Cortés', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Montes de Oca', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Mora', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Moravia', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Pérez Zeledón', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Puriscal', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Santa Ana', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Tarrazú', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Tibás', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Turrubares', 'province_id' => $provinces_ids['San José']],
				[ 'name' => 'Vázquez de Coronado', 'province_id' => $provinces_ids['San José']],

        		// Heredia
                [ 'name' => 'Heredia', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Barva', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Belén', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Flores', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'San Isidro', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'San Pablo', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'San Rafael', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Santa Bárbara', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Santo Domingo', 'province_id' => $provinces_ids['Heredia']],
				[ 'name' => 'Sarapiquí', 'province_id' => $provinces_ids['Heredia']],

				// Alajuela
                [ 'name' => 'Alajuela', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Atenas', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Grecia', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Guatuso', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Los Chiles', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Naranjo', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Orotina', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Palmares', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Poás', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'San Carlos', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'San Mateo', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'San Ramón', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Upala', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Valverde Vega', 'province_id' => $provinces_ids['Alajuela']],
				[ 'name' => 'Zarcero', 'province_id' => $provinces_ids['Alajuela']],

				// Cartago
                [ 'name' => 'Cartago', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'Alvarado', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'El Guarco', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'Jiménez', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'La Unión', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'Oreamuno', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'Paraíso', 'province_id' => $provinces_ids['Cartago']],
				[ 'name' => 'Turrialba', 'province_id' => $provinces_ids['Cartago']],

				// Guanacaste
                [ 'name' => 'Liberia', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Abangares', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Bagaces', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Cañas', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Carrillo', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Hojancha', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'La Cruz', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Nandayure', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Nicoya', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Santa Cruz', 'province_id' => $provinces_ids['Guanacaste']],
				[ 'name' => 'Tilarán', 'province_id' => $provinces_ids['Guanacaste']],

				// Puntarenas
                [ 'name' => 'Puntarenas', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Aguirre', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Buenos Aires', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Corredores', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Coto Brus', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Esparza', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Garabito', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Golfito', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Montes de Oro', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Osa', 'province_id' => $provinces_ids['Puntarenas']],
				[ 'name' => 'Parrita', 'province_id' => $provinces_ids['Puntarenas']],

				// Limón
                [ 'name' => 'Limón', 'province_id' => $provinces_ids['Limón']],
				[ 'name' => 'Guácimo', 'province_id' => $provinces_ids['Limón']],
				[ 'name' => 'Matina', 'province_id' => $provinces_ids['Limón']],
				[ 'name' => 'Pococí', 'province_id' => $provinces_ids['Limón']],
				[ 'name' => 'Siquirres', 'province_id' => $provinces_ids['Limón']],
				[ 'name' => 'Talamanca', 'province_id' => $provinces_ids['Limón']]
	    ]);
    }
}
