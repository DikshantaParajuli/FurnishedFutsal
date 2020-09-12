<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = [
         'ground_name', 'player_name', 'player_email', 'player_contact', 'booked_date', 'booked_time'
    ];
}
