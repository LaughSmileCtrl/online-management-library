<?php

namespace Database\Factories;

use App\Models\UserBook;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenaltyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'borrow_id' => UserBook::factory(),
            'bill' => $this->faker->numberBetween(1,10),
            'paid_off' => $this->faker->numberBetween(1,10),
        ];
    }
}
