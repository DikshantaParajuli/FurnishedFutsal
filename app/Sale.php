<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    public $timestamps = false;
      protected $fillable = [
         'ground_name', 'player_name', 'booked_date', 'booked_time', 'price'
    ];
}
