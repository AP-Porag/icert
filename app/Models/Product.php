<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name','price','stock'
    ];

    public function authentiCatorProduct()
    {
        return $this->hasMany(AuthenticatorProduct::class,'product_id');
    }
}
