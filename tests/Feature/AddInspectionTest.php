<?php

namespace Tests\Feature;

use App\Services\InspectionService;
use Tests\TestCase;

class AddInspectionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_adding_inspection()
    {
        $service = app()->make(InspectionService::class);

        $inspection = $service->store([
            'turbine_components' => [
                'turbine_components_id' => 1,
                'grade' => rand(1,5),

            ]
        ]);

        $this->assertDatabaseHas('inspections', ['id' => $inspection->id]);
    }
}
