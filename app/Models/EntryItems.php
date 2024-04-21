<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryItems extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entry()
    {
        return  $this->belongsTo(Entry::class,'entry_id');
    }
}
