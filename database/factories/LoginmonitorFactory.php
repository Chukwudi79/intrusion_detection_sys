<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginmonitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'log_attempt' => $this->faker->numberBetween($min = 1, $max = 3),
            'type' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'company_id' => Company::all()->random()->id,
            'ip_address' => $this->faker->ipv4(),
            'device_type' => $this->faker->domainWord(),
            'browser_type' => null,
            'state' => null,
        ];
    }
}
