<?php

namespace Tests\Unit;

use App\Incident;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	public function testFetchIncidentsOverTime_CurrentYear_CorrectQty()
    {
		$N = 15;
		//Given I have N incidents from the current month in the db
		factory('App\Incident', $N)->create([
			'date' => \Carbon\Carbon::now()->toDateString()
		]);

		//When I fetch the incidents of the current year
		$incidentsOverTime = Incident::incidentsOverTime(\Carbon\Carbon::now()->year);

		
		$i = 0;
		for(; $i < 12; ++$i)
		{
			if ($incidentsOverTime[$i]['month'] == Carbon\Carbon::now()->month) break;
		} 
		//Then response should have N incidents in the current month
		$this->assertEquals($N, $incidentsOverTime[$i]['qty'])
	}
}
