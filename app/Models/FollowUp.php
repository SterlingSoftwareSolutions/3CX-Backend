<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'inquiry_id',
        'user_id',
        'customer_id'
    ];

}
