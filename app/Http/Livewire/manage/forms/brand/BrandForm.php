<?php

namespace App\Http\Livewire\Manage\Forms\Brand;

use Livewire\Component;
use App\Http\Services\BrandService;


class BrandForm extends Component
{
    public $name;

    public function create(BrandService $brandService)
    {
        $newBrand = $brandService->create($this->name);
        error_log($newBrand);
        error_log('trying to send event');
        try {
            $this->emit('updatedBrand');
        } catch (\Exception $ex) {
            error_log($ex);
        }
    }
    public function render()
    {
        return view('livewire.manage.forms.brand.brand-form');
    }
}
