<?php

namespace Database\Factories;

use App\Models\laboratorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laboratorie>
 */
class laboratoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=laboratorie::class;
    public function definition(): array
    {
        return [
            'Laboratory_name'=> $this->faker->randomElement(['lab1','lab2','lab3']),
            'Laboratory_address'=> $this->faker->randomElement(['add1','add2','add3'])
        ];
    }
}
