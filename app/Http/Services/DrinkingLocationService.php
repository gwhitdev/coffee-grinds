<?php

namespace App\Http\Services;

use App\Models\DrinkingLocation;

class DrinkingLocationService
{

    public function create(array $address) : bool
    {
        try {
            DrinkingLocation::create([
                'address_first_line' => $address['address_first_line'],
                'address_postcode' => $address['address_postcode']
            ]);
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    public function edit(int $id, array $address) : bool
    {
        $location = DrinkingLocation::find($id);
        $keys = array_keys($address);

        foreach($keys as $k)
        {
            $location[$k] = $address[$k];
        }
        try {
            $location->save();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    public function delete(int $id) : bool
    {
        try {
            $location = DrinkingLocation::find($id);
            $location->delete();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
