<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
