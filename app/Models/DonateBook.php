<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'isbn',
        'title',
        'author',
        'publisher',
        'category_id',
        'year',
        'description',
        'quantity',
        'condition_id',
    ];

    protected $attributes = [
        'image' => '/images/books/cover.jpg',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function condition()
    {
        return $this->belongsTo(BookCondition::class);
    }
}
