<?php

namespace App\Http\Livewire\Manage\Pages\Users;

use Livewire\Component;
use App\Models\User;

class EditUserPage extends Component
{
    public int $userId;
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->userId = $this->user->id;
    }
    public function render()
    {
        return view('livewire.manage.pages.users.edit-user-page');
    }
}
