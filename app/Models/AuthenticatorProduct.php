<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthenticatorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'authenticator_id','product_id'
    ];

    public function authenticator()
    {
        return $this->belongsTo(Authenticator::class,'authenticator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
