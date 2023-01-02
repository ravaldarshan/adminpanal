<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class policyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'policy_title' => fake()->title(),
            'policy_desc' => fake()->text(50),
            'policy_link' => fake()->randomElement(['hbshfsh','dnsjdn']),
        ];
    }
}
