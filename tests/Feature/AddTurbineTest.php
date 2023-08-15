<?php

namespace Tests\Feature;

use App\Services\TurbineService;
use Illuminate\Support\Str;
use Tests\TestCase;

class AddTurbineTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_adding_turbine()
    {
        $service = app()->make(TurbineService::class);

        $turbine = $service->store([
            'name' => Str::random(5),
            'lat' => rand(1.0,35.0),
            'lng' => rand(1.0,35.0),
            'components' => [
                1,2
            ]
        ]);

        $this->assertDatabaseHas('turbines', ['id' => $turbine->id]);
    }
}
