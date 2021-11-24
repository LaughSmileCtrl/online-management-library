<?php

namespace Database\Factories;

use App\Models\AnnouncementType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => User::factory(),
            'type_id' => AnnouncementType::factory(),
            'title' => $this->faker->word(),
            'message' => $this->faker->text(200),
        ];
    }
}
