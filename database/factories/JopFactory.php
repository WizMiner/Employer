<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jop>
 */
class JopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id'=> Employer::factory(),
            'title'=>fake()->jobTitle(),
            'salary'=>fake()->randomElement(['$50,000 USD', '$100,000 USD', '$150,000 USD']),
            'location'=>fake()->country(),
            'schedule'=>fake()->randomElement(['Full Time', 'Eight Hours', 'Six Hours']),
            'URL'=> false, 
        ];
    }
}
