<?php

namespace App\Http\Livewire\Manage\Forms\CoffeeTypes;

use App\Http\Services\CoffeeTypesService;
use App\Models\CoffeeType;
use Livewire\Component;

class CreateCoffeeTypeForm extends Component
{
    public $description;

    protected $rules = [
        'description' => 'required'
    ];
    public function create(CoffeeTypesService $coffeeTypesService)
    {
        $coffeeTypesService->create($this->description);
        $this->emit('createdCoffeeType');
    }

    public function render()
    {
        return view('livewire.manage.forms.CoffeeTypes.create-coffee-type-form');
    }
}
