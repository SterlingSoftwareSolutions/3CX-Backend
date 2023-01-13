<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'status_remark',
        'inquiry_id',
        'user_id',
        'customer_id'
    ];
}
