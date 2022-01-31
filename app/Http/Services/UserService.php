<?php

namespace App\Http\Services;

use App\Models\DrinkingEvent;
use App\Models\User;
class UserService
{
    public function createCoffeeEvent(DrinkingEvent $eventDetails)
    {
        $saved = DrinkingEvent::class;
        try {
            $saved = $eventDetails->save();
        } catch(\Exception $ex) {
            error_log($ex->getMessage());
        }
        return $saved;
    }

    public function changeRole(int $userId, int $roleId)
    {
        $user = User::find($userId);
        try {
            $user->role_id = $roleId;
            $user->save();
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
        }
        return $user;
    }

    public function delete(int $userId)
    {
        try {
            $user = User::find($userId);
            $user->delete();
            return true;
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return false;
        }
    }
}
