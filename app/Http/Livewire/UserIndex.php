<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class UserIndex extends Component
{
    public $currentUserId;
    public $users;
    public $roles;

    public $search;
    public $queryString = ['search' => ['except' => '', 'as' => 's']];

    protected $listeners = ['userCreated' => '$refresh', 'deleteUser'];

    public $viewMode;

    public $deletingUser;

    public $roleFilter;


    public function mount()
    {
        $this->viewMode = 'grid';
        //$this->roleFilter = 'all';
        //$this->roles = Role::pluck('name');
        $this->currentUserId = Auth::id();
    }

    public function render()
    {
        $this->users = User::where('name', 'like', "%$this->search%")
            ->orWhere('email', 'like', "%$this->search%")
            ->get();
        return view('livewire.user-index');
    }

    public function edit($userId)
    {
        $this->emit('editUser', $userId);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
        $this->emit('actionCompleted');

        return redirect()->route('user.index')->with('flash.banner', 'Usuario eliminado');
    }

    public function confirmDelete($id)
    {
        $this->emit('selectItem', $id);
    }
}
