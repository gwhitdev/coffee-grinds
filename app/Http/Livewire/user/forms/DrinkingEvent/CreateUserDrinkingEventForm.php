<?php

namespace App\Http\Livewire\User\Forms\DrinkingEvent;

use App\Http\Services\DrinkingEventService;
use App\Models\Brand;
use App\Models\CoffeeType;
use App\Models\DrinkingEvent;
use App\Models\DrinkingLocation;
use App\Models\DrinkType;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Auth;

class CreateUserDrinkingEventForm extends Component
{
    public DrinkingEvent $drinkingEvent;
    public iterable $suppliers;
    public iterable $brands;
    public iterable $drinkTypes;
    public iterable $locations;
    public iterable $coffeeTypes;

    protected array $rules = [
        'drinkingEvent.coffee_type_id' => 'required',
        'drinkingEvent.drinking_location_id' => 'int',
        'drinkingEvent.drink_type_id' => 'int',
        'drinkingEvent.supplier_id' => 'int',
        'drinkingEvent.drank_at_home' => 'required|bool',
        'drinkingEvent.brand_id' => 'int',
        'drinkingEvent.comments' => 'string',
        'drinkingEvent.rating' => 'int',
        'drinkingEvent.event_date_time' => 'required'
    ];

    public function create(DrinkingEventService $drinkingEventService)
    {
        $newEvent = $this->drinkingEvent;
        $newEvent->user_id = Auth::user()->id;
        $newEvent->event_date_time = Carbon::parse($this->drinkingEvent->event_date_time);
        $created = $drinkingEventService->create($newEvent);
        if ($created) $this->emit('createdDrinkingEvent');
    }

    public function mount()
    {
        $this->drinkingEvent = new DrinkingEvent();
        $this->coffeeTypes = CoffeeType::all();
        $this->locations = DrinkingLocation::all();
        $this->drinkTypes = DrinkType::all();
        $this->brands = Brand::all();
        $this->suppliers = Auth::user()->suppliers;
        //var_dump($this->suppliers);
    }

    public function render()
    {
        return view('livewire.user.forms.drinking-event.create-user-drinking-event-form');
    }
}
