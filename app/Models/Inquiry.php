<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'call_type_id',
        'brand',
        'brand_availability',
        'product_category',
        'order_id',
        'inquiry_id_ext',
        'status_remark',
        'open'
    ];

    public function call_type()
    {
        return $this->belongsTo(CallType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
