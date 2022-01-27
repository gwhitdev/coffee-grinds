<?php

namespace App\Http\Livewire\Manage\Forms\Suppliers;

use App\Http\Services\SupplierService;
use Livewire\Component;
use Auth;

class CreateSupplierForm extends Component
{
    public string $reference = '';
    public string $address_first_line = '';
    public string $postcode = '';
    public string $url = '';

    public function create(SupplierService $supplierService)
    {
        $details = [
            'reference' => $this->reference,
            'address_first_line' => $this->address_first_line,
            'address_postcode' => $this->postcode,
            'url' => $this->url,
            'user_id' => Auth::user()->id ?? 1
        ];

        $newSupplier = $supplierService->create($details);
        if ($newSupplier) $this->emit('createdSupplier');
    }
    public function render()
    {
        return view('livewire.manage.forms.suppliers.create-supplier-form');
    }
}
