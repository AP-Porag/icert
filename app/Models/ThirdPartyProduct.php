<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyProduct extends Model
{
    use HasFactory;

    protected $fillable = ['third_party_id','product_id'];

    public function party()
    {
        return $this->belongsTo(ThirdParty::class,'third_party_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
