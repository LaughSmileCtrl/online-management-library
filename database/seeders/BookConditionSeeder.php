<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_conditions')
            ->insert([
                ['name' => 'baru'],
                ['name' => 'bekas'],
                ['name' => 'rusak (bisa dipakai)'],
                ['name' => 'rusak parah'],
            ]);
    }
}
