<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::factory()
            ->count(10)
            ->create();
    }
}
