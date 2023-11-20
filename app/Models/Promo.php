<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_EXPIRED = 'expired';
    public const PRIORITY_NORMAL = 'normal';
    public const PRIORITY_SPECIAL = 'special';
    protected $fillable = [
        'name','value','number_of_items','start_date','end_date','no_end_date','status','priority','is_select_customer'
    ];
}
