<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return  $this->hasMany(EntryItems::class,'entry_id');
    }

    public function customer()
    {
        return  $this->belongsTo(Customer::class,'customer_id');
    }
}
