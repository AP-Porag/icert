<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyDropOffCenter extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'contact_name',
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
        'status',
    ];
}
