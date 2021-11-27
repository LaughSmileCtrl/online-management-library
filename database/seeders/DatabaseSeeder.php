<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AnnouncementSeeder::class,
            BookCategorySeeder::class,
            BookConditionSeeder::class,
            DepartmentSeeder::class,
            UserDetailSeeder::class,
            UserBookSeeder::class,
            DonateBookSeeder::class,
        ]);
    }
}
