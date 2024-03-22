<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Project::class;
    public function definition(): array
    {
        return [
            'project_number' => $this->faker->unique()->randomNumber(5),
            'governorate' => $this->faker->city,
            'designing_engineering_office' => $this->faker->company,
            'project_name' => $this->faker->sentence,
            'widget' => $this->faker->numberBetween(1, 100),
            'the_basin' => $this->faker->numberBetween(1, 10), // Adjust the range as per your requirements
            'region' => $this->faker->word,
            'spacae' => $this->faker->randomNumber(4),
            'project_status'=> $this->faker->randomElement(['Suspended','Under Execution','Under Execution/Completed Construction']),
            'Laboratory_name' => $this->faker->randomElement(['lab1','lab2','lab3']),
            'contractor_engineer_number' => $this->faker->randomElement([10, 20, 30,40]),
            'contractor_id' => $this->faker->randomElement([10,20,30,40])
        ];


    }
}
