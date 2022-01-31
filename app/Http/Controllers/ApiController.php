<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    // USER

    public function updateUserRole(Request $request, int $userId, UserService $userService) : Response
    {
        $updatedUser = $userService->changeRole($userId, $request->input('role_id'));
        return response([
            $updatedUser
        ]);
    }
}
