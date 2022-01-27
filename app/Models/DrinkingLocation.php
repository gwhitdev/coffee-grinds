<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkingLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_first_line',
        'address_postcode'
    ];

    public function drinkingEvent()
    {
        return $this->belongsToMany(DrinkingEvent::class);
    }
}
