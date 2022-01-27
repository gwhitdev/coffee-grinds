<?php

namespace App\Http\Services;

use App\Models\DrinkType;

class DrinkTypesService
{
    public function create(string $name) : DrinkType
    {
        return DrinkType::create([
            'name' => $name
        ]);
    }

    public function delete(int $id) : bool
    {
        try {
            $drinkType = DrinkType::find($id);
            $drinkType->delete();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    public function edit(int $id, string $name) : bool
    {
        try {
            DrinkType::where('id',$id)
                ->update(['name' => $name]);
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
