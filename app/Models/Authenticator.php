<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authenticator extends Model
{
    use HasFactory,SoftDeletes;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPEND = 'suspend';
    public const STATUS_DELETE = 'delete';
    protected $fillable = [
        'name','status'
    ];

    public function products()
    {
        return  $this->hasMany(AuthenticatorProduct::class,'authenticator_id');
    }
}
