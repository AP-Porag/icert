<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'contact_name',
        'phone',
    ];

    public function promos()
    {
        return $this->hasMany(CustomerPromo::class,'customer_id');
    }
}
