<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    protected $fillable = [
        'ground_type', 'ground_name', 'size', 'price', 'extra', 'groundImage'
    ];
}
