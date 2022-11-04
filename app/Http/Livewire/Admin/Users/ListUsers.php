<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ListUsers extends Component
{
    public $state = [];

    public function addNew() {
       $this->dispatchBrowserEvent('show-form');
    }

    public function createUser() {
        $data = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $data['password'] = bcrypt($data['password']);

        User::create($data);
        $this->dispatchBrowserEvent('hide-form');
        return redirect()->back();
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    }
}
