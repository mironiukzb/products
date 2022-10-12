<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,
        ModelTrait;
    
    protected $fillable = [
        'description',
        'price_id'
    ];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
