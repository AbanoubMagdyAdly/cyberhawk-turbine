<?php

namespace Tests\Feature;

use App\Services\ComponentService;
use Illuminate\Support\Str;
use Tests\TestCase;

class AddComponentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_adding_component()
    {
        $service = app()->make(ComponentService::class);

        $component = $service->store([
            'name' =>  Str::random(5),
        ]);

        $this->assertDatabaseHas('components', ['id' => $component->id]);
    }
}
