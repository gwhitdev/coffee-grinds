<?php

namespace App\Http\Services;

use App\Models\DrinkingEvent;


class DrinkingEventService
{

    public function create(DrinkingEvent $event) : bool
    {
        try {
            $event->save();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }

    public function delete(int $id) : bool
    {
        try {
            $event = DrinkingEvent::find($id);
            $event->delete();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
