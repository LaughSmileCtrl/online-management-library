<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'created_by');
    }

    public function type()
    {
        return $this->belongsTo(AnnouncementType::class, 'type_id');
    }
}
