<?php

namespace Database\Seeders;

use App\Models\DonateBook;
use Illuminate\Database\Seeder;

class DonateBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonateBook::factory()
            ->count(10)
            ->create();
    }
}
