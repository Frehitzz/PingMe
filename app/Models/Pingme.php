<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method bool update(array $attributes = [], array $options = [])
 * @method bool|null delete()
 */
class Pingme extends Model
{
    protected $table = 'pingme';

    // protection for the message column
    protected $fillable = [
        'message',
    ];

    // This is how you link tables together
    public function user(): BelongsTo
    {
        // Every pings belong to a user
        return $this->belongsTo(User::class);
        // User - is the name of the filename in Models/User.php
        // User::class - this will ive laravel a full gps coordinates
        //               to find this User files it turns in to a string like:
        //               "App\Models\User"
        // belongsTo() - is a lravel built in function to find the the user_id column inside the Ping table
        // why belngsto find the
    }
}
