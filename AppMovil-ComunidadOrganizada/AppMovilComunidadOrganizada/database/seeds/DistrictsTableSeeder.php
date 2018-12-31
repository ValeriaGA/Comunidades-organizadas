<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Canton;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantons = Canton::all();
    	$cantons_ids = array();
    	foreach ($cantons as $canton)
    	{
    		$cantons_ids[$canton->name] = $canton->id;
    	}

        DB::table('districts')->insert([

        		// San José

        		// San José
                [ 'name' => 'Carmen', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Catedral', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Hatillo', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Hospital', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'La Uruca', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Mata Redonda', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Merced', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Pavas', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'San Francisco de Dos Ríos', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'San Sebastián', 'canton_id' => $cantons_ids['San José'] ],
				[ 'name' => 'Zapote', 'canton_id' => $cantons_ids['San José'] ],
				// Acosta
            	[ 'name' => 'Cangrejal', 'canton_id' => $cantons_ids['Acosta'] ],
				[ 'name' => 'Guaitil', 'canton_id' => $cantons_ids['Acosta'] ],
				[ 'name' => 'Palmichal', 'canton_id' => $cantons_ids['Acosta'] ],
				[ 'name' => 'Sabanillas', 'canton_id' => $cantons_ids['Acosta'] ],
				[ 'name' => 'San Ignacio', 'canton_id' => $cantons_ids['Acosta'] ],
				// Alajuelita
				[ 'name' => 'Alajuelita', 'canton_id' => $cantons_ids['Alajuelita'] ],
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['Alajuelita'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Alajuelita'] ],
				[ 'name' => 'San Felipe', 'canton_id' => $cantons_ids['Alajuelita'] ],
				[ 'name' => 'San Josecito', 'canton_id' => $cantons_ids['Alajuelita'] ],
				// Aserrí
            	[ 'name' => 'Aserrí', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'Legua', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'Monterrey', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'Salitrillos', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'San Gabriel', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'Tarbaca', 'canton_id' => $cantons_ids['Aserrí'] ],
				[ 'name' => 'Vuelta de Jorco', 'canton_id' => $cantons_ids['Aserrí'] ],
				// Curridabat
				[ 'name' => 'Curridabat', 'canton_id' => $cantons_ids['Curridabat'] ],
				[ 'name' => 'Granadilla', 'canton_id' => $cantons_ids['Curridabat'] ],
				[ 'name' => 'Sánchez', 'canton_id' => $cantons_ids['Curridabat'] ],
				[ 'name' => 'Tirrases', 'canton_id' => $cantons_ids['Curridabat'] ],
				// Desamparados
				[ 'name' => 'Desamparados', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Damas', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Frailes', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Gravilias', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Los Guido', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Patarrá', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'Rosario', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Cristóbal', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Juan de Dios', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Miguel', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Rafael Abajo', 'canton_id' => $cantons_ids['Desamparados'] ],
				[ 'name' => 'San Rafael Arriba', 'canton_id' => $cantons_ids['Desamparados'] ],
				// Dota
				[ 'name' => 'Copey', 'canton_id' => $cantons_ids['Dota'] ],
				[ 'name' => 'Jardín', 'canton_id' => $cantons_ids['Dota'] ],
				[ 'name' => 'Santa María', 'canton_id' => $cantons_ids['Dota'] ],
				// Escazú
				[ 'name' => 'Escazú', 'canton_id' => $cantons_ids['Escazú'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Escazú'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Escazú'] ],
				// Goicoechea
				[ 'name' => 'Calle Blancos', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'Guadalupe', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'Ipís', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'Mata de Plátano', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'Purral', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'Rancho Redondo', 'canton_id' => $cantons_ids['Goicoechea'] ],
				[ 'name' => 'San Francisco', 'canton_id' => $cantons_ids['Goicoechea'] ],
				// León Cortés
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['León Cortés'] ],
				[ 'name' => 'San Andrés', 'canton_id' => $cantons_ids['León Cortés'] ],
				[ 'name' => 'Llano Bonito', 'canton_id' => $cantons_ids['León Cortés'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['León Cortés'] ],
				[ 'name' => 'Santa Cruz', 'canton_id' => $cantons_ids['León Cortés'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['León Cortés'] ],
				// Montes de Oca
				[ 'name' => 'Mercedes', 'canton_id' => $cantons_ids['Montes de Oca'] ],
				[ 'name' => 'Sabanilla', 'canton_id' => $cantons_ids['Montes de Oca'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Montes de Oca'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Montes de Oca'] ],
				// Mora
				[ 'name' => 'Ciudad Colón', 'canton_id' => $cantons_ids['Mora'] ],
				[ 'name' => 'Guayabo', 'canton_id' => $cantons_ids['Mora'] ],
				[ 'name' => 'Jaris', 'canton_id' => $cantons_ids['Mora'] ],
				[ 'name' => 'Picagres', 'canton_id' => $cantons_ids['Mora'] ],
				[ 'name' => 'Piedras Negras', 'canton_id' => $cantons_ids['Mora'] ],
				[ 'name' => 'Tabarcia', 'canton_id' => $cantons_ids['Mora'] ],
				// Moravia
				[ 'name' => 'San Jerónimo', 'canton_id' => $cantons_ids['Moravia'] ],
				[ 'name' => 'San Vicente', 'canton_id' => $cantons_ids['Moravia'] ],
				[ 'name' => 'Trinidad', 'canton_id' => $cantons_ids['Moravia'] ],
				// Pérez Zeledón
				[ 'name' => 'Barú', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Cajón', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Daniel Flores', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'El General', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Llano Bonito', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Páramo', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Pejibaye', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Platanares', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Río Nuevo', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Rivas', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Andrés', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Isidro de El General', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				[ 'name' => 'Santa Cruz', 'canton_id' => $cantons_ids['Pérez Zeledón'] ],
				// Puriscal
				[ 'name' => 'Barbacoas', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Candelarita', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Chires', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Desamparaditos', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Grifo Alto', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Mercedes Sur', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Puriscal'] ],
				[ 'name' => 'Santiago', 'canton_id' => $cantons_ids['Puriscal'] ],
				// Santa Ana
				[ 'name' => 'Brasil', 'canton_id' => $cantons_ids['Santa Ana'] ],
				[ 'name' => 'Piedades', 'canton_id' => $cantons_ids['Santa Ana'] ],
				[ 'name' => 'Pozos', 'canton_id' => $cantons_ids['Santa Ana'] ],
				[ 'name' => 'Salitral', 'canton_id' => $cantons_ids['Santa Ana'] ],
				[ 'name' => 'Santa Ana', 'canton_id' => $cantons_ids['Santa Ana'] ],
				[ 'name' => 'Uruca', 'canton_id' => $cantons_ids['Santa Ana'] ],
				// Tarrazú
				[ 'name' => 'San Carlos', 'canton_id' => $cantons_ids['Tarrazú'] ],
				[ 'name' => 'San Lorenzo', 'canton_id' => $cantons_ids['Tarrazú'] ],
				[ 'name' => 'San Marcos', 'canton_id' => $cantons_ids['Tarrazú'] ],
				// Tibás
				[ 'name' => 'Anselmo Llorente', 'canton_id' => $cantons_ids['Tibás'] ],
				[ 'name' => 'Cinco Esquinas', 'canton_id' => $cantons_ids['Tibás'] ],
				[ 'name' => 'Colima', 'canton_id' => $cantons_ids['Tibás'] ],
				[ 'name' => 'León XIII', 'canton_id' => $cantons_ids['Tibás'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['Tibás'] ],
				// Turrubares
				[ 'name' => 'Carara', 'canton_id' => $cantons_ids['Turrubares'] ],
				[ 'name' => 'San Juan de Mata', 'canton_id' => $cantons_ids['Turrubares'] ],
				[ 'name' => 'San Luis', 'canton_id' => $cantons_ids['Turrubares'] ],
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['Turrubares'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Turrubares'] ],
				// Vázquez de Coronado
				[ 'name' => 'Cascajal', 'canton_id' => $cantons_ids['Vázquez de Coronado'] ],
				[ 'name' => 'Dulce Nombre de Jesús', 'canton_id' => $cantons_ids['Vázquez de Coronado'] ],
				[ 'name' => 'Patalillo', 'canton_id' => $cantons_ids['Vázquez de Coronado'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Vázquez de Coronado'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Vázquez de Coronado'] ],

        		// Heredia
                // Heredia
				[ 'name' => 'Heredia', 'canton_id' => $cantons_ids['Heredia'] ],
				[ 'name' => 'Mercedes', 'canton_id' => $cantons_ids['Heredia'] ],
				[ 'name' => 'San Francisco', 'canton_id' => $cantons_ids['Heredia'] ],
				[ 'name' => 'Ulloa', 'canton_id' => $cantons_ids['Heredia'] ],
				[ 'name' => 'Varablanca', 'canton_id' => $cantons_ids['Heredia'] ],
				// Barva
				[ 'name' => 'Barva', 'canton_id' => $cantons_ids['Barva'] ],
				[ 'name' => 'San José de la Montaña', 'canton_id' => $cantons_ids['Barva'] ],
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['Barva'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Barva'] ],
				[ 'name' => 'San Roque', 'canton_id' => $cantons_ids['Barva'] ],
				[ 'name' => 'Santa Lucía', 'canton_id' => $cantons_ids['Barva'] ],
				// Belén
				[ 'name' => 'La Asunción', 'canton_id' => $cantons_ids['Belén'] ],
				[ 'name' => 'La Ribera', 'canton_id' => $cantons_ids['Belén'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Belén'] ],
				// Flores
				[ 'name' => 'Barrantes', 'canton_id' => $cantons_ids['Flores'] ],
				[ 'name' => 'Llorente', 'canton_id' => $cantons_ids['Flores'] ],
				[ 'name' => 'San Joaquín', 'canton_id' => $cantons_ids['Flores'] ],
				// San Isidro
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['San Isidro'] ],
				[ 'name' => 'San Francisco', 'canton_id' => $cantons_ids['San Isidro'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['San Isidro'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['San Isidro'] ],
				// San Pablo
				[ 'name' => 'Rincón de Sabanilla', 'canton_id' => $cantons_ids['San Pablo'] ],
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['San Pablo'] ],
				// San Rafael
				[ 'name' => 'Ángeles', 'canton_id' => $cantons_ids['San Rafael'] ],
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['San Rafael'] ],
				[ 'name' => 'San Josecito', 'canton_id' => $cantons_ids['San Rafael'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['San Rafael'] ],
				[ 'name' => 'Santiago', 'canton_id' => $cantons_ids['San Rafael'] ],
				// Santa Bárbara
				[ 'name' => 'Jesús', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				[ 'name' => 'Purabá', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				[ 'name' => 'Santa Bárbara', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				[ 'name' => 'Santo Domingo', 'canton_id' => $cantons_ids['Santa Bárbara'] ],
				// Santo Domingo
				[ 'name' => 'Pará', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'Paracito', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'San Miguel', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'San Vicente', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'Santa Rosa', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'Santo Domingo', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'Santo Tomás', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				[ 'name' => 'Tures', 'canton_id' => $cantons_ids['Santo Domingo'] ],
				// Sarapiquí
				[ 'name' => 'Cureña', 'canton_id' => $cantons_ids['Sarapiquí'] ],
				[ 'name' => 'La Virgen', 'canton_id' => $cantons_ids['Sarapiquí'] ],
				[ 'name' => 'Las Horquetas', 'canton_id' => $cantons_ids['Sarapiquí'] ],
				[ 'name' => 'Llanuras del Gaspar', 'canton_id' => $cantons_ids['Sarapiquí'] ],
				[ 'name' => 'Puerto Viejo', 'canton_id' => $cantons_ids['Sarapiquí'] ],

				// Alajuela

                // Alajuela
				[ 'name' => 'Alajuela', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Carrizal', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Desamparados', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Garita', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Guácima', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Río Segundo', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Sabanilla', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Sarapiquí', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Tambor', 'canton_id' => $cantons_ids['Alajuela'] ],
				[ 'name' => 'Turrúcares', 'canton_id' => $cantons_ids['Alajuela'] ],
				// Atenas
				[ 'name' => 'Atenas', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'Escobal', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'Jesús', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'Mercedes', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['Atenas'] ],
				[ 'name' => 'Santa Eulalia', 'canton_id' => $cantons_ids['Atenas'] ],
				// Grecia
				[ 'name' => 'Bolívar', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'Grecia', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'Puente de Piedra', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'Río Cuarto', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'San Roque', 'canton_id' => $cantons_ids['Grecia'] ],
				[ 'name' => 'Tacares', 'canton_id' => $cantons_ids['Grecia'] ],
				// Guatuso
				[ 'name' => 'Buenavista', 'canton_id' => $cantons_ids['Guatuso'] ],
				[ 'name' => 'Cote', 'canton_id' => $cantons_ids['Guatuso'] ],
				[ 'name' => 'Katira', 'canton_id' => $cantons_ids['Guatuso'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Guatuso'] ],
				// Los Chiles
				[ 'name' => 'Caño Negro', 'canton_id' => $cantons_ids['Los Chiles'] ],
				[ 'name' => 'El Amparo', 'canton_id' => $cantons_ids['Los Chiles'] ],
				[ 'name' => 'Los Chiles', 'canton_id' => $cantons_ids['Los Chiles'] ],
				[ 'name' => 'San Jorge', 'canton_id' => $cantons_ids['Los Chiles'] ],
				// Naranjo
				[ 'name' => 'Cirri Sur', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'El Rosario', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'Naranjo', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'Palmitos', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'San Jerónimo', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['Naranjo'] ],
				[ 'name' => 'San Miguel', 'canton_id' => $cantons_ids['Naranjo'] ],
				// Orotina
				[ 'name' => 'Coyolar', 'canton_id' => $cantons_ids['Orotina'] ],
				[ 'name' => 'Hacienda Vieja', 'canton_id' => $cantons_ids['Orotina'] ],
				[ 'name' => 'La Ceiba', 'canton_id' => $cantons_ids['Orotina'] ],
				[ 'name' => 'Mastate', 'canton_id' => $cantons_ids['Orotina'] ],
				[ 'name' => 'Orotina', 'canton_id' => $cantons_ids['Orotina'] ],
				// Palmares
				[ 'name' => 'Buenos Aires', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'Candelaria', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'Esquipulas', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'La Granja', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'Palmares', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'Santiago', 'canton_id' => $cantons_ids['Palmares'] ],
				[ 'name' => 'Zaragoza', 'canton_id' => $cantons_ids['Palmares'] ],
				// Poás
				[ 'name' => 'Carrillos', 'canton_id' => $cantons_ids['Poás'] ],
				[ 'name' => 'Sabana Redonda', 'canton_id' => $cantons_ids['Poás'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['Poás'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Poás'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Poás'] ],
				// San Carlos
				[ 'name' => 'Aguas Zarcas', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Buenavista', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Cutris', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Florencia', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'La Fortuna', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'La Palmera', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'La Tigra', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Monterrey', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Pital', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Pocosol', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Quesada', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Venado', 'canton_id' => $cantons_ids['San Carlos'] ],
				[ 'name' => 'Venecia', 'canton_id' => $cantons_ids['San Carlos'] ],
				// San Mateo
				[ 'name' => 'San Mateo', 'canton_id' => $cantons_ids['San Mateo'] ],
				[ 'name' => 'Desmonte', 'canton_id' => $cantons_ids['San Mateo'] ],
				[ 'name' => 'Jesús María', 'canton_id' => $cantons_ids['San Mateo'] ],
				// San Ramón
				[ 'name' => 'Alfaro', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Ángeles', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Peñas Blancas', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Piedades Norte', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Piedades Sur', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'San Ramón', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Santiago', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Volio', 'canton_id' => $cantons_ids['San Ramón'] ],
				[ 'name' => 'Zapotal', 'canton_id' => $cantons_ids['San Ramón'] ],
				// Upala
				[ 'name' => 'Aguas Claras', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'Bijagua', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'Delicias', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'Dos Ríos', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'San José', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'Upala', 'canton_id' => $cantons_ids['Upala'] ],
				[ 'name' => 'Yolillal', 'canton_id' => $cantons_ids['Upala'] ],
				// Valverde Vega
				[ 'name' => 'Rodríguez', 'canton_id' => $cantons_ids['Valverde Vega'] ],
				[ 'name' => 'San Pedro', 'canton_id' => $cantons_ids['Valverde Vega'] ],
				[ 'name' => 'Sarchí Norte', 'canton_id' => $cantons_ids['Valverde Vega'] ],
				[ 'name' => 'Sarchí Sur', 'canton_id' => $cantons_ids['Valverde Vega'] ],
				[ 'name' => 'Toro Amarillo', 'canton_id' => $cantons_ids['Valverde Vega'] ],
				// Zarcero
				[ 'name' => 'Brisas', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Guadalupe', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Laguna', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Palmira', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Tapezco', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Zapote', 'canton_id' => $cantons_ids['Zarcero'] ],
				[ 'name' => 'Zarcero', 'canton_id' => $cantons_ids['Zarcero'] ],

				// Cartago

                // Cartago
				[ 'name' => 'Agua Caliente', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Carmen', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Corralillo', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Dulce Nombre', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Guadalupe', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Llano Grande', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Occidental', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Oriental', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Quebradilla', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'San Nicolás', 'canton_id' => $cantons_ids['Cartago'] ],
				[ 'name' => 'Tierra Blanca', 'canton_id' => $cantons_ids['Cartago'] ],
				// Alvarado
				[ 'name' => 'Capellades', 'canton_id' => $cantons_ids['Alvarado'] ],
				[ 'name' => 'Cervantes', 'canton_id' => $cantons_ids['Alvarado'] ],
				[ 'name' => 'Pacayas', 'canton_id' => $cantons_ids['Alvarado'] ],
				// El Guarco
				[ 'name' => 'Patio de Agua', 'canton_id' => $cantons_ids['El Guarco'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['El Guarco'] ],
				[ 'name' => 'Tejar', 'canton_id' => $cantons_ids['El Guarco'] ],
				[ 'name' => 'Tobosi', 'canton_id' => $cantons_ids['El Guarco'] ],
				// Jiménez
				[ 'name' => 'Juan Viñas', 'canton_id' => $cantons_ids['Jiménez'] ],
				[ 'name' => 'Pejibaye', 'canton_id' => $cantons_ids['Jiménez'] ],
				[ 'name' => 'Tucurrique', 'canton_id' => $cantons_ids['Jiménez'] ],
				// La Unión
				[ 'name' => 'Concepción', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'Dulce Nombre', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'Río Azul', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'San Diego', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'San Ramón', 'canton_id' => $cantons_ids['La Unión'] ],
				[ 'name' => 'Tres Ríos', 'canton_id' => $cantons_ids['La Unión'] ],
				// Oreamuno
				[ 'name' => 'Cipreses', 'canton_id' => $cantons_ids['Oreamuno'] ],
				[ 'name' => 'Cot', 'canton_id' => $cantons_ids['Oreamuno'] ],
				[ 'name' => 'Potrero Cerrado', 'canton_id' => $cantons_ids['Oreamuno'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Oreamuno'] ],
				[ 'name' => 'Santa Rosa', 'canton_id' => $cantons_ids['Oreamuno'] ],
				// Paraíso
				[ 'name' => 'Cachí', 'canton_id' => $cantons_ids['Paraíso'] ],
				[ 'name' => 'Llanos de Santa Lucía', 'canton_id' => $cantons_ids['Paraíso'] ],
				[ 'name' => 'Orosí', 'canton_id' => $cantons_ids['Paraíso'] ],
				[ 'name' => 'Paraíso', 'canton_id' => $cantons_ids['Paraíso'] ],
				[ 'name' => 'Santiago de Paraíso', 'canton_id' => $cantons_ids['Paraíso'] ],
				// Turrialba
				[ 'name' => 'Chirripó', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'La Isabel', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'La Suiza', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Pavones', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Peralta', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Santa Cruz', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Santa Rosa', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Santa Teresita', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Tayutic', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Tres Equis', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Tuis', 'canton_id' => $cantons_ids['Turrialba'] ],
				[ 'name' => 'Turrialba', 'canton_id' => $cantons_ids['Turrialba'] ],

				// Guanacaste

                // Liberia
				[ 'name' => 'Cañas Dulces', 'canton_id' => $cantons_ids['Liberia'] ],
				[ 'name' => 'Curubandé', 'canton_id' => $cantons_ids['Liberia'] ],
				[ 'name' => 'Liberia', 'canton_id' => $cantons_ids['Liberia'] ],
				[ 'name' => 'Mayorga', 'canton_id' => $cantons_ids['Liberia'] ],
				[ 'name' => 'Nacascolo', 'canton_id' => $cantons_ids['Liberia'] ],
				// Abangares
				[ 'name' => 'Colorado', 'canton_id' => $cantons_ids['Abangares'] ],
				[ 'name' => 'Las Juntas', 'canton_id' => $cantons_ids['Abangares'] ],
				[ 'name' => 'San Juan', 'canton_id' => $cantons_ids['Abangares'] ],
				[ 'name' => 'Sierra', 'canton_id' => $cantons_ids['Abangares'] ],
				// Bagaces
				[ 'name' => 'Bagaces', 'canton_id' => $cantons_ids['Bagaces'] ],
				[ 'name' => 'La Fortuna', 'canton_id' => $cantons_ids['Bagaces'] ],
				[ 'name' => 'Mogote', 'canton_id' => $cantons_ids['Bagaces'] ],
				[ 'name' => 'Río Naranjo', 'canton_id' => $cantons_ids['Bagaces'] ],
				// Cañas
				[ 'name' => 'Bebedero', 'canton_id' => $cantons_ids['Cañas'] ],
				[ 'name' => 'Cañas', 'canton_id' => $cantons_ids['Cañas'] ],
				[ 'name' => 'Palmira', 'canton_id' => $cantons_ids['Cañas'] ],
				[ 'name' => 'Porozal', 'canton_id' => $cantons_ids['Cañas'] ],
				[ 'name' => 'San Miguel', 'canton_id' => $cantons_ids['Cañas'] ],
				// Carrillo
				[ 'name' => 'Belén', 'canton_id' => $cantons_ids['Carrillo'] ],
				[ 'name' => 'Filadelfia', 'canton_id' => $cantons_ids['Carrillo'] ],
				[ 'name' => 'Palmira', 'canton_id' => $cantons_ids['Carrillo'] ],
				[ 'name' => 'Sardinal', 'canton_id' => $cantons_ids['Carrillo'] ],
				// Hojancha
				[ 'name' => 'Hojancha', 'canton_id' => $cantons_ids['Hojancha'] ],
				[ 'name' => 'Huacas', 'canton_id' => $cantons_ids['Hojancha'] ],
				[ 'name' => 'Monte Romo', 'canton_id' => $cantons_ids['Hojancha'] ],
				[ 'name' => 'Puerto Carrillo', 'canton_id' => $cantons_ids['Hojancha'] ],
				// La Cruz
				[ 'name' => 'La Cruz', 'canton_id' => $cantons_ids['La Cruz'] ],
				[ 'name' => 'La Garita', 'canton_id' => $cantons_ids['La Cruz'] ],
				[ 'name' => 'Santa Cecilia', 'canton_id' => $cantons_ids['La Cruz'] ],
				[ 'name' => 'Santa Elena', 'canton_id' => $cantons_ids['La Cruz'] ],
				// Nandayure
				[ 'name' => 'Bejuco', 'canton_id' => $cantons_ids['Nandayure'] ],
				[ 'name' => 'Carmona', 'canton_id' => $cantons_ids['Nandayure'] ],
				[ 'name' => 'Porvenir', 'canton_id' => $cantons_ids['Nandayure'] ],
				[ 'name' => 'San Pablo', 'canton_id' => $cantons_ids['Nandayure'] ],
				[ 'name' => 'Santa Rita', 'canton_id' => $cantons_ids['Nandayure'] ],
				[ 'name' => 'Zapotal', 'canton_id' => $cantons_ids['Nandayure'] ],
				// Nicoya
				[ 'name' => 'Belén de Nosarita', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'Mansión', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'Nicoya', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'Nosara', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'Quebrada Honda', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'Sámara', 'canton_id' => $cantons_ids['Nicoya'] ],
				[ 'name' => 'San Antonio', 'canton_id' => $cantons_ids['Nicoya'] ],
				// Santa Cruz
				[ 'name' => 'Bolsón', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Cabo Velas', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Cartagena', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Cuajiniquil', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Diriá', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Santa Cruz', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Tamarindo', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Tempate', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				[ 'name' => 'Veintisiete de Abril', 'canton_id' => $cantons_ids['Santa Cruz'] ],
				// Tilarán
				[ 'name' => 'Arenal', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Líbano', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Quebrada Grande', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Santa Rosa', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Tierras Morenas', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Tilarán', 'canton_id' => $cantons_ids['Tilarán'] ],
				[ 'name' => 'Tronadora', 'canton_id' => $cantons_ids['Tilarán'] ],

				// Puntarenas

                // Puntarenas
				[ 'name' => 'Acapulco', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Arancibia', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Barranca', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Chacarita', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Chira', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Chomes', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Cóbano', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'El Roble', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Guacimal', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Isla del Coco', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Lepanto', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Manzanillo', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Monteverde', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Paquera', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Pitahaya', 'canton_id' => $cantons_ids['Puntarenas'] ],
				[ 'name' => 'Puntarenas', 'canton_id' => $cantons_ids['Puntarenas'] ],
				// Aguirre
				[ 'name' => 'Naranjito', 'canton_id' => $cantons_ids['Aguirre'] ],
				[ 'name' => 'Quepos', 'canton_id' => $cantons_ids['Aguirre'] ],
				[ 'name' => 'Savegre', 'canton_id' => $cantons_ids['Aguirre'] ],
				// Buenos Aires
				[ 'name' => 'Biolley', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Boruca', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Brunka', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Buenos Aires', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Chánguena', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Colinas', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Pilas', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Potrero Grande', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				[ 'name' => 'Volcán', 'canton_id' => $cantons_ids['Buenos Aires'] ],
				// Corredores
				[ 'name' => 'Corredor', 'canton_id' => $cantons_ids['Corredores'] ],
				[ 'name' => 'La Cuesta', 'canton_id' => $cantons_ids['Corredores'] ],
				[ 'name' => 'Laurel', 'canton_id' => $cantons_ids['Corredores'] ],
				[ 'name' => 'Paso Canoas', 'canton_id' => $cantons_ids['Corredores'] ],
				// Coto Brus
				[ 'name' => 'Aguabuena', 'canton_id' => $cantons_ids['Coto Brus'] ],
				[ 'name' => 'Limoncito', 'canton_id' => $cantons_ids['Coto Brus'] ],
				[ 'name' => 'Pittier', 'canton_id' => $cantons_ids['Coto Brus'] ],
				[ 'name' => 'Sabalito', 'canton_id' => $cantons_ids['Coto Brus'] ],
				[ 'name' => 'San Vito', 'canton_id' => $cantons_ids['Coto Brus'] ],
				[ 'name' => 'Gutiérrez Brown', 'canton_id' => $cantons_ids['Coto Brus'] ],
				// Esparza
				[ 'name' => 'Espíritu Santo', 'canton_id' => $cantons_ids['Esparza'] ],
				[ 'name' => 'Macacona', 'canton_id' => $cantons_ids['Esparza'] ],
				[ 'name' => 'San Jerónimo', 'canton_id' => $cantons_ids['Esparza'] ],
				[ 'name' => 'San Juan Grande', 'canton_id' => $cantons_ids['Esparza'] ],
				[ 'name' => 'San Rafael', 'canton_id' => $cantons_ids['Esparza'] ],
				// Garabito
				[ 'name' => 'Jacó', 'canton_id' => $cantons_ids['Garabito'] ],
				[ 'name' => 'Tárcoles', 'canton_id' => $cantons_ids['Garabito'] ],
				// Golfito
				[ 'name' => 'Golfito', 'canton_id' => $cantons_ids['Golfito'] ],
				[ 'name' => 'Guayará', 'canton_id' => $cantons_ids['Golfito'] ],
				[ 'name' => 'Pavón', 'canton_id' => $cantons_ids['Golfito'] ],
				[ 'name' => 'Puerto Jiménez', 'canton_id' => $cantons_ids['Golfito'] ],
				// Montes de Oro
				[ 'name' => 'La Unión', 'canton_id' => $cantons_ids['Montes de Oro'] ],
				[ 'name' => 'Miramar', 'canton_id' => $cantons_ids['Montes de Oro'] ],
				[ 'name' => 'San Isidro', 'canton_id' => $cantons_ids['Montes de Oro'] ],
				// Osa
				[ 'name' => 'Bahía Ballena', 'canton_id' => $cantons_ids['Osa'] ],
				[ 'name' => 'Palmar', 'canton_id' => $cantons_ids['Osa'] ],
				[ 'name' => 'Piedras Blancas', 'canton_id' => $cantons_ids['Osa'] ],
				[ 'name' => 'Puerto Cortés', 'canton_id' => $cantons_ids['Osa'] ],
				[ 'name' => 'Sierpe', 'canton_id' => $cantons_ids['Osa'] ],
				// Parrita
				[ 'name' => 'Parrita', 'canton_id' => $cantons_ids['Parrita'] ],

				// Limón

                // Limón
				[ 'name' => 'Limón', 'canton_id' => $cantons_ids['Limón'] ],
				[ 'name' => 'Matama', 'canton_id' => $cantons_ids['Limón'] ],
				[ 'name' => 'Río Blanco', 'canton_id' => $cantons_ids['Limón'] ],
				[ 'name' => 'Valle La Estrella', 'canton_id' => $cantons_ids['Limón'] ],
				// Guácimo
				[ 'name' => 'Duacarí', 'canton_id' => $cantons_ids['Guácimo'] ],
				[ 'name' => 'Guácimo', 'canton_id' => $cantons_ids['Guácimo'] ],
				[ 'name' => 'Mercedes', 'canton_id' => $cantons_ids['Guácimo'] ],
				[ 'name' => 'Pocora', 'canton_id' => $cantons_ids['Guácimo'] ],
				[ 'name' => 'Río Jiménez', 'canton_id' => $cantons_ids['Guácimo'] ],
				// Matina
				[ 'name' => 'Batán', 'canton_id' => $cantons_ids['Matina'] ],
				[ 'name' => 'Carrandi', 'canton_id' => $cantons_ids['Matina'] ],
				[ 'name' => 'Matina', 'canton_id' => $cantons_ids['Matina'] ],
				// Pococí
				[ 'name' => 'Cariari', 'canton_id' => $cantons_ids['Pococí'] ],
				[ 'name' => 'Colorado', 'canton_id' => $cantons_ids['Pococí'] ],
				[ 'name' => 'Guápiles', 'canton_id' => $cantons_ids['Pococí'] ],
				[ 'name' => 'Jiménez', 'canton_id' => $cantons_ids['Pococí'] ],
				[ 'name' => 'Rita', 'canton_id' => $cantons_ids['Pococí'] ],
				[ 'name' => 'Roxana', 'canton_id' => $cantons_ids['Pococí'] ],
				// Siquirres
				[ 'name' => 'Alegría', 'canton_id' => $cantons_ids['Siquirres'] ],
				[ 'name' => 'Cairo', 'canton_id' => $cantons_ids['Siquirres'] ],
				[ 'name' => 'Florida', 'canton_id' => $cantons_ids['Siquirres'] ],
				[ 'name' => 'Germania', 'canton_id' => $cantons_ids['Siquirres'] ],
				[ 'name' => 'Pacuarito', 'canton_id' => $cantons_ids['Siquirres'] ],
				[ 'name' => 'Siquirres', 'canton_id' => $cantons_ids['Siquirres'] ],
				// Talamanca
				[ 'name' => 'Bratsi', 'canton_id' => $cantons_ids['Talamanca'] ],
				[ 'name' => 'Cahuita', 'canton_id' => $cantons_ids['Talamanca'] ],
				[ 'name' => 'Sixaola', 'canton_id' => $cantons_ids['Talamanca'] ],
				[ 'name' => 'Telire', 'canton_id' => $cantons_ids['Talamanca'] ]
	    ]);
    }
}
