<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete(Request $request, int $userId, UserService $userService)
    {
        $userService->delete($userId);
        return redirect('/manage/users');
    }
}
