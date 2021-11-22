<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    private $bookCategories = ['politik', 'hukum', 'sains'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->bookCategories as $category) {
            DB::table('book_categories')->insert([
                'name' => $category
            ]);
        }
    }
}
