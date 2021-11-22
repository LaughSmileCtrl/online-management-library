<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookConditionSeeder extends Seeder
{
    private $bookConditions = ['baru', 'bekas', 'tidak lengkap'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->bookConditions as $condition) {
            DB::table('book_conditions')->insert([
                'name' => $condition
            ]);
        }
    }
}
