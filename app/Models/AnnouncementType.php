<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

}
