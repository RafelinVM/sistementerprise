<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
    ];

    public function sendPromotions()
    {
        return $this->hasMany(SendPromotion::class);
    }
}