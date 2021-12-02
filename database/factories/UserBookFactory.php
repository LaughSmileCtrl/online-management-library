<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBookFactory extends Factory
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
            'book_id' => Book::factory(),
            'due_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'borrow_at' => $this->faker->date(),
            'due_at' => $this->faker->dateTimeBetween('now', '+2 week'),
            'bill' => $this->faker->numberBetween(5,10),
            'paid_off' => $this->faker->numberBetween(1,5),
        ];
    }
}
