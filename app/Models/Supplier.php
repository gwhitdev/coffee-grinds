<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'address_first_line',
        'address_postcode',
        'url',
        'user_id'
    ];
    public function drinkingEvent()
    {
        return $this->belongsToMany(DrinkingEvent::class);
    }

    public function user()
    {
        return $this->belongsTo(Supplier::class);
    }
}
