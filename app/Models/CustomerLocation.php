<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function customer_address()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}
