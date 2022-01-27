<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeType extends Model
{
    use HasFactory;
    protected $fillable = [
        'description'
    ];

    public function drinkingEvents()
    {
        return $this->belongsToMany(DrinkingEvent::class);
    }
}
