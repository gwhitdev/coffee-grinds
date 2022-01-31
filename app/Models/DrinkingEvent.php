<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkingEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_date_time',
        'rating',
        'comments',
        'drank_at_home',
        'coffee_type_id',
        'supplier_id',
        'brand_id',
        'drinking_type_id',
        'drinking_location_id'
    ];
    public function coffeeType()
    {
        return $this->belongsTo(CoffeeType::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function drinkType()
    {
        return $this->belongsTo(DrinkType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drinkingLocation()
    {
        return $this->belongsTo(DrinkingLocation::class);
    }


    public function atHomeOrLocation() : string
    {
        if($this->drank_at_home === 1)
        {
            return 'At home';
        }

        if($this->drank_at_home === 0 && is_null($this->drinkingLocation()->first()))
        {
            return 'No location';
        }

        if(!is_null($this->drinkingLocation()->first()))
        {
            return ($this->drinkingLocation()->first())->address_first_line;
        }
    }
}
