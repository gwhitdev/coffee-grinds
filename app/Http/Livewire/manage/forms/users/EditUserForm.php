<?php

namespace App\Http\Livewire\Manage\Forms\Users;

use App\Http\Services\UserService;
use App\Models\User;
use Livewire\Component;
use App\Models\Role;

class EditUserForm extends Component
{
    public iterable $roles;
    public User $user;
    protected UserService $userService;
    public int $roleId;

    protected $listeners = [
        'changeRole'
    ];

    protected $rules = [
        'user.role_id' => 'int'
    ];

    public function changeRole(UserService $userService)
    {
        $this->validate();
        $updated = $userService->changeRole($this->user->id,$this->user->role_id);
        if ($updated)
        {
            session()->flash('message','Role successfully changed');
        }
        else
        {
            session()->flash('message','Could not change role');
        }
        $this->render();
    }
    public function mount(int $userId)
    {

        $this->user = User::find($userId);
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.manage.forms.users.edit-user-form');
    }
}
