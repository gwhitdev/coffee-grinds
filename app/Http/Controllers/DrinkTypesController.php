<?php

namespace App\Http\Controllers;

use App\Http\Services\DrinkTypesService;
use App\Models\DrinkType;
use Illuminate\Http\Request;

class DrinkTypesController extends Controller
{
    public function delete(Request $request, int $id, DrinkTypesService $drinkTypesService)
    {
        $deleted = $drinkTypesService->delete($id);
        if ($deleted) return redirect('/manage/drink-types');
        return redirect('manage/drink-types');


    }

    public function edit(Request $request, int $id, DrinkTypesService $drinkTypesService)
    {
        $drinkType = DrinkType::find($id);
        if ($drinkType)
        {
            $edited = $drinkTypesService->edit($id, $request->input('name'));
            if ($edited) return redirect('/manage/drink-types');
        }
        return redirect('/manage/drink-types');


    }
}
