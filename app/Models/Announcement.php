<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'type_id',
        'title',
        'message',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function type()
    {
        return $this->belongsTo(AnnouncementType::class, 'type_id');
    }
}
