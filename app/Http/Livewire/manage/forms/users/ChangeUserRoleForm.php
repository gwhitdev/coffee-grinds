<?php

namespace App\Http\Livewire;

use App\Http\Services\UserService;
use Livewire\Component;

class ChangeUserRoleForm extends Component
{

    public function render(int $userId, UserService $userService)
    {
        return view('livewire.manage.forms.users.change-user-role-form');
    }
}
