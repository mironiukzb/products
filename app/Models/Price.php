<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'value'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
