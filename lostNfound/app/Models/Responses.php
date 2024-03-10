<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responses extends Model
{
    use HasFactory;

    protected $fillable = [
        'notice_id', 
        'responder_id', 
        'message'
    ];

    // Assuming each response belongs to a notice
    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }

    // Assuming each response is made by a user
    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }
}
