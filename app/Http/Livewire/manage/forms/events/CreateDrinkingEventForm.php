<?php

namespace App\Http\Livewire\Manage\Forms\Events;

use App\Http\Services\DrinkingEventService;
use App\Models\DrinkingEvent;
use App\Models\DrinkingLocation;
use App\Models\DrinkType;
use App\Models\Supplier;
use Carbon\Doctrine\DateTimeType;
use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\CoffeeType;
use App\Models\Brand;
use Auth;
class CreateDrinkingEventForm extends Component
{
    public DrinkingEvent $drinkingEvent;

    public iterable $suppliers;
    public iterable $brands;
    public iterable $drinkTypes;
    public iterable $locations;
    public iterable $coffeeTypes;

    protected array $rules = [
        'drinkingEvent.coffee_type_id' => 'required',
        'drinkingEvent.drinking_location_id' => 'max:3',
        'drinkingEvent.drink_type_id' => 'int|required',
        'drinkingEvent.supplier_id' => 'int|required',
        'drinkingEvent.drank_at_home' => 'required|bool',
        'drinkingEvent.brand_id' => 'int|required',
        'drinkingEvent.comments' => 'string',
        'drinkingEvent.rating' => 'int',
        'drinkingEvent.event_date_time' => 'required'
    ];

    public function create(DrinkingEventService $drinkingEventService)
    {
        $this->validate();
        $newEvent = $this->drinkingEvent;
        $newEvent->user_id = Auth::user()->id;
        $newEvent->event_date_time = Carbon::parse($this->drinkingEvent->event_date_time);
        $created = $drinkingEventService->create($newEvent);
        if ($created)
        {
            $this->emit('createdDrinkingEvent');
            $this->drinkingEvent = new DrinkingEvent();
        }
    }

    public function mount()
    {
        $this->drinkingEvent = new DrinkingEvent();
        //$this->drinkingEvent->drinking_location_id = 0;
        $this->drinkingEvent->rating = 0;
        $this->coffeeTypes = CoffeeType::all();
        $this->locations = DrinkingLocation::all();
        $this->drinkTypes = DrinkType::all();
        $this->brands = Brand::all();
        $this->suppliers = Auth::user()->suppliers;
        //var_dump($this->suppliers);
    }
    public function render()
    {
        return view('livewire.manage.forms.events.create-drinking-event-form');
    }
}
