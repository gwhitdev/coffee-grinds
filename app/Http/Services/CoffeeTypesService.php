<?php

namespace App\Http\Services;

use App\Models\CoffeeType;

class CoffeeTypesService
{


    public function create(string $description) : CoffeeType
    {
        return CoffeeType::create([
            'description' => $description
        ]);
    }

    public function delete(int $id) : bool
    {
        $coffeeType = CoffeeType::class;
        try {
            $coffeeType = CoffeeType::find($id);
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
        }

        if($coffeeType)
        {
            $coffeeType->delete();
            return true;
        }
        else
        {
            return false;
        }
    }

    public function edit(int $id, string $newDescription) : bool
    {
        try {
            CoffeeType::where('id',$id)
                ->update([
                    'description' => $newDescription
                ]);
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
