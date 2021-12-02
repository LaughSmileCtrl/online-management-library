<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrp',
        'department_id',
    ];

    protected $attributes = [
        'address' => '',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
