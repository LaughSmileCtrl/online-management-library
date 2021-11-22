<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->randomNumber(8, true),
            'title' => $this->faker->realText(20),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'category_id' => rand(1,3),
            'year' => rand(2010, 2021),
            'description' => $this->faker->realText(),
            'quantity' => rand(1,10),
            'condition_id' => rand(1,3),
            'image' => 'images/cover.jpg'
        ];
    }
}
