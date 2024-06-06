<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function receiving()
    {
        return  $this->belongsTo(Receivig::class,'receiving_id');
    }
}
