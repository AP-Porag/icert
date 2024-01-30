<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'customer_contact_name',
        'customer_email',
        'customer_phone',
        'customer_id',
        'customer_id',
        'grading_company',
        'billing_contact_name',
        'billing_email',
        'billing_address_line_one',
        'billing_address_line_two',
        'billing_country',
        'billing_province',
        'billing_city',
        'billing_postal',
        'billing_phone',

        'shipping_contact_name',
        'shipping_email',
        'shipping_address_line_one',
        'shipping_address_line_two',
        'shipping_country',
        'shipping_province',
        'shipping_city',
        'shipping_postal',
        'shipping_phone',

        'submission_date',
        'promo_code',
        'payment_method',
        'shopify_order_number',

        'shipping_method',
        'pickup_location',
        'third_party_drop_off_center',
        'use_customer_account',
        'customer_account_number',

        'show_pickup',
        'pickup_location',
    ];
}
