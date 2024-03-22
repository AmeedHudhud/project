<?php

namespace Database\Factories;

use App\Models\engineer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\engineer>
 */
class enginnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = engineer::class;
    public function definition(): array
    {
        $specializations = ['كهربا', 'مدني'];

        return [
            'engineer_number' => $this->faker->randomElement([10,20,30,40]),
            'engineer_name' => $this->faker->name,
            'mobile_number' => $this->faker->phoneNumber,
            'specialization_name' => $this->faker->randomElement($specializations),
        ];
    }
}
