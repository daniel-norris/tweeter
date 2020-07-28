<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // opposite of $fillable and acts as a blacklist for attributes that cannot be mass assigned
    // left it empty temporarily
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
