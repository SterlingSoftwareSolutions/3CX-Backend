<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'comment',
        'call_type_group_id'
    ];

    function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
