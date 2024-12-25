<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'phone_number',
        'faculty',
        'course',
        'personal_login_phrase',
        'profile_pic',
        'IC',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $timestamp = false;

    public function createdPost()
    {
        return $this->hasMany(Post::class);
    }

    public function createdComment()
    {
        return $this->hasMany(Comment::class);
    }

    public function conversations(){
        return $this->hasMany(Conversation::class);
    }

    // public function sentConversations()
    // {
    //     return $this->hasMany(Conversation::class, 'sender_id');
    // }

    // public function receivedConversations()
    // {
    //     return $this->hasMany(Conversation::class, 'receiver_id');
    // }
}
