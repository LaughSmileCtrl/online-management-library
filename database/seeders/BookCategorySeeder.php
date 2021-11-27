<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_categories')
            ->insert([
                ['name' => 'Buku Islam '],
                ['name' => 'Buku Rohani Kristen '],
                ['name' => 'Buku Anak '],
                ['name' => 'Buku Sekolah '],
                ['name' => 'Bahasa & Kamus '],
                ['name' => 'Biografi & Memoar '],
                ['name' => 'Bisnis & Keuangan '],
                ['name' => 'Hobi & Keterampilan '],
                ['name' => 'Hukum '],
                ['name' => 'Kedokteran & Kesehatan '],
                ['name' => 'Komputer & Internet '],
                ['name' => 'Novel & Sastra '],
                ['name' => 'Pertanian & Lingkungan Hidup '],
                ['name' => 'Pendidikan & Keguruan '],
                ['name' => 'Psikologi & Pengembangan Diri '],
                ['name' => 'Referensi & Ensiklopedi '],
                ['name' => 'Sejarah, Budaya & Filsafat '],
                ['name' => 'Sosial & Politik '],
                ['name' => 'Teknik & Ilmu Pengetahuan '],
                ['name' => 'Buku Umum'],
                ['name' => 'Buku Obral'],
            ]);
    }
}
