<?php

namespace App\Http\Services;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class BrandService
{
    public function create(string $name) : Model
    {
        return Brand::create([
            'name' => $name
        ]);
    }

    public function delete(int $id) : bool
    {
        $foundBrand = Brand::class;
        try {
            $foundBrand = Brand::find($id);
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
        }
        if($foundBrand)
        {
            $foundBrand->delete();
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update(array $details) : bool
    {
        $brand = Brand::find($details['id']);
        $brand->name = $details['name'];
        $brand->save();
        return $brand->wasChanged();
    }
}
