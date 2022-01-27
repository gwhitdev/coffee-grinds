<?php

namespace App\Http\Services;

use App\Models\Supplier;

class SupplierService
{
    public function create(array $details) : bool
    {
        try {
            Supplier::create([
               'reference' => $details['reference'],
               'address_first_line' => $details['address_first_line'],
               'address_postcode' => $details['address_postcode'],
               'user_id' => $details['user_id']
            ]);
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    public function delete(int $id) : bool
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->delete();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
