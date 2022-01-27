<?php

namespace App\Http\Livewire\Manage\Forms\Locations;

use App\Http\Services\DrinkingLocationService;
use Livewire\Component;

class CreateDrinkingLocationForm extends Component
{
    public string $address_first_line ='';
    public string $address_postcode ='';

    public function create(DrinkingLocationService $drinkingLocationService)
    {
        $newLocation = $drinkingLocationService->create([
            'address_first_line' => $this->address_first_line,
            'address_postcode' => $this->address_postcode
        ]);
        if ($newLocation) $this->emit('createdDrinkingLocation');
    }
    public function render()
    {
        return view('livewire.manage.forms.locations.create-drinking-location-form');
    }
}
