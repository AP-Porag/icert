<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public const CUSTOMER_FOR_ICERT    = 'icert';
    public const CUSTOMER_FOR_KSA    = 'ksa';

    protected $fillable =[
        'name',
        'email',
        'contact_name',
        'phone',
        'customer_for',
        'billing_address_line_one',
        'billing_address_line_two',
        'billing_country',
        'billing_province',
        'billing_city',
        'billing_postal',
        'billing_phone',
        'same_as_billing',
        'shipping_name',
        'shipping_company_name',
        'shipping_address_line_one',
        'shipping_address_line_two',
        'shipping_country',
        'shipping_province',
        'shipping_city',
        'shipping_postal',
        'shipping_phone',
    ];

    public function promos()
    {
        return $this->hasMany(CustomerPromo::class,'customer_id');
    }

    public function entry()
    {
        return  $this->hasMany(Entry::class,'customer_id');
    }
}
