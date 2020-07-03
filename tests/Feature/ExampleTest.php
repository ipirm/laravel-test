<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function request_should_fail_when_first_is_negative(): void
    {
        $response = $this->postJson(route('sum'), [
                'first' => $this->faker->numberBetween(-20, -1)
            ]);
        $response->assertJsonValidationErrors('first');
    }

    public function request_should_fail_when_second_is_negative(): void
    {
        $response = $this->postJson(route('sum'), [
            'second' => $this->faker->numberBetween(-20, -1)
        ]);
        $response->assertJsonValidationErrors('second');
    }

    public function request_should_be_positive_whene_sum(): void
    {
        $response = $this->postJson(route('sum'), [
            'first' => $this->faker->numberBetween(0, 9999999),
            'second' => $this->faker->numberBetween(0, 9999999)
        ]);
        $response->assertOk();
    }
}
