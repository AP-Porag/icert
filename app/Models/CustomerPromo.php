<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPromo extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','promo_id'
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class,'promo_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
