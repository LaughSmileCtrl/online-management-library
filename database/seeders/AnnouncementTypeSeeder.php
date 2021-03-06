<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementTypeSeeder extends Seeder
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
    }
}
