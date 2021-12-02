<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_book')
                ->withPivot(['due_at', 'borrow_at', 'return_at', 'bill', 'paid_off']);
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
