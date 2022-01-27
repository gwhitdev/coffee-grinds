<?php

namespace App\Http\Controllers;

use App\Http\Services\CoffeeTypesService;
use App\Models\CoffeeType;
use Illuminate\Http\Request;

class CoffeeTypesController extends Controller
{
    public function delete(Request $request, int $id, CoffeeTypesService $coffeeTypesService)
    {
        $foundCoffeeType = CoffeeType::find($id);
        if($foundCoffeeType) $coffeeTypesService->delete($id);
        return redirect('/manage/coffee-types');
    }

    public function edit(Request $request, int $id, CoffeeTypesService $coffeeTypesService)
    {
        $description = $request->input('description');
        $coffeeTypesService->edit($id, $description);
    }
}
