<?php

namespace Database\Factories;

use Date;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayrolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'company_id' => Company::all()->random()->id,
            'employment_date' => date('Y-m-d'),
            'created_by' => $this->faker->email(),
            'updated_by' => $this->faker->unique()->safeEmail(),
            'grade_level' => $this->faker->numberBetween($min = 6, $max = 16),
            'salary' => $this->faker->numberBetween($min = 100000, $max = 200000),
        ];
    }
}
