<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'customer_location_id',
        'address_line_1'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customer_location()
    {
        return $this->belongsTo(CustomerLocation::class);
    }
}
