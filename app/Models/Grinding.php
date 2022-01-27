<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grinding extends Model
{
    use HasFactory;
    protected $fillable = [
        'grind_setting',
        'quantity_used',
        'repeatable'
    ];
    public function drinkingEvent()
    {
        return $this->belongsToMany(DrinkingEvent::class);
    }
}
