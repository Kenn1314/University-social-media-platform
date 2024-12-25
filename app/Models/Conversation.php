<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id'
    ];

    // public function user() 
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function sender()
    // {
    //     return $this->belongsTo(User::class, 'sender_id', 'id');
    // }

    // public function receiver()
    // {
    //     return $this->belongsTo(User::class, 'receiver_id', 'id');
    // }
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
