<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'avatar', 'cover_photo', 'about', 'facebook', 'youtube', 'twitter', 'linkedin', 'user_id', 'job_title', 'location',
    ];
}
