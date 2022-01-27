<?php

namespace App\Http\Controllers;

use App\Http\Services\DrinkingEventService;
use Illuminate\Http\Request;

class DrinkingEventsController extends Controller
{
    public function delete(Request $request, int $id, DrinkingEventService $drinkingEventService)
    {
        $deleted = $drinkingEventService->delete($id);
        if ($deleted) return redirect('/manage/drinking-events');
        return redirect('/manage/drinking-events');
    }

    public function edit()
    {
        //
    }
}
