<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'nrp' => $this->faker->randomNumber(8, true),
            'address'=> $this->faker->address(),
            'department_id' => rand(1, 2),
        ];
    }
}
