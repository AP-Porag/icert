<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receivig extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return  $this->hasMany(ReceivingItem::class,'receiving_id');
    }

    public function entry()
    {
        return  $this->belongsTo(Entry::class,'entry_id');
    }
    public function customer()
    {
        return  $this->belongsTo(Customer::class,'customer_id');
    }
}
