<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;
     protected $fillable = [
        'user_email', 'item_name', 'rate', 'quantity', 'expense_date'
    ];
}
