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
        DB::table('announcement_types')
            ->insert([
                ['name' => 'info'],
                ['name' => 'peringatan'],
            ]);

        Announcement::factory()
            ->count(10)
            ->create();
    }
}
