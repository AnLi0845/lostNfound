<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'date',
        'venue',
        'contact',
        'description',
        'image',
        'status'
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optionally, add a relationship with the Response model if you want to track responses to notices
    public function responses()
    {
        return $this->hasMany(Responses::class);
    }
}
