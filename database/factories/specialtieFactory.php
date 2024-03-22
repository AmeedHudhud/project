<?php

namespace Database\Factories;

use App\Models\specialtie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\specialtie>
 */
class specialtieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=specialtie::class;

    public function definition(): array
    {
        return [
            'specialization_name'=> $this->faker->randomElement(['كهربا','مدني']),
        ];
    }
}
