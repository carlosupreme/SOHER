<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $search;
    public $queryString = ['search' => ['except' => '', 'as' => 's']];
    protected $listeners = ['userCreated' => '$refresh', 'deleteUser'];
    public $deletingUser;

    public function render()
    {
        $users = User::matching($this->search, 'name', 'email')->orderBy('id')->get();
        return view('livewire.user-index', compact('users'));
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
