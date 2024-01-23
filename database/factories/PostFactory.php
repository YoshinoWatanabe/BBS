<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => $this->faker->realTextBetween(10, 250, 5),
            'created_by' => $this->faker->numberBetween(1, 5)
        ];
    }
}
