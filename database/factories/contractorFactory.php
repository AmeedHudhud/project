<?php

namespace Database\Factories;

use App\Models\contractor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contractor>
 */
class contractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=contractor::class;
    public function definition(): array
    {
        $classifications = ['first_class', 'second_class', 'third_class', 'fourth_class', 'fifty_class', 'Unclassified'];

        return [
            'id' => $this->faker->unique()->randomElement([10,20,30,40]), // Assuming auto-incremented by the database
            'Contractor_name' => $this->faker->name,
            'Building_classification' => $this->faker->randomElement($classifications),
        ];
    }
}
