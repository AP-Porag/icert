<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyProduct extends Model
{
    use HasFactory;

    protected $fillable = ['third_party_id','product_id'];
}
