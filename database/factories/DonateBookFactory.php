<?php

namespace Database\Factories;

use App\Models\BookCategory;
use App\Models\BookCondition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonateBookFactory extends Factory
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
            'isbn' => $this->faker->randomNumber(8, true),
            'title' => $this->faker->realText(20),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'category_id' => rand(1, 21),
            'year' => rand(2010, 2021),
            'description' => $this->faker->realText(),
            'condition_id' => rand(1, 4),         
            'image' => 'images/cover.jpg',
            'quantity' => $this->faker->numberBetween(2,10),
        ];
    }
}
