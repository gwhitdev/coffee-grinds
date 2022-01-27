<?php

namespace App\Http\Controllers;

use App\Http\Services\DrinkingLocationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\RoutingServiceProvider;

class DrinkingLocationsController extends Controller
{

    public function delete(Request $request, int $id, DrinkingLocationService $drinkingLocationService)
    {
        $drinkingLocationService->delete($id);
        return redirect('/manage/drinking-locations')->with('message',"Could not delete $id");
    }

    public function edit(Request $request, int $id, DrinkingLocationService $drinkingLocationService)
    {
        $edited = $drinkingLocationService->edit($id, $request->input('address'));
        if ($edited) return redirect('/manage/drinking-locations');
        return redirect('/manage/drinking-locations')->with('message',"Could not edit $id");
    }
}
