<?php

namespace App\Http\Livewire\Manage\Forms\DrinkTypes;

use App\Http\Services\DrinkTypesService;
use Livewire\Component;

class CreateDrinkTypeForm extends Component
{
    public string $name = '';

    public function create(DrinkTypesService $drinkTypesService)
    {
        $newDrinkType = $drinkTypesService->create($this->name);
        if ($newDrinkType) $this->emit('createdDrinkType');
    }
    public function render()
    {
        return view('livewire.manage.forms.drink-types.create-drink-type-form');
    }
}
