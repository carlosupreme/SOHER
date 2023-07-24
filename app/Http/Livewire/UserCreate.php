<?php

namespace App\Http\Livewire;

use App\Models\User;
use Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $username;
    public $email;
    public $open;
    public $password;
    public $password_confirmation;
    public $roles = [];
    public $rolesOptions;
    protected $rules = [
        'username' => 'required|min:3|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
        'roles' => 'required'
    ];


    public function mount()
    {
        $this->open = false;
        $this->rolesOptions = Role::all(['id', 'name'])->toArray();
    }

    public function store()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $user->roles()->sync($this->roles);

        $this->emit('userCreated');

        return redirect()->route('user.index')->with('flash.banner', 'Usuario creado correctamente');
    }

    public function resetValues()
    {
        $this->resetExcept('rolesOptions');
    }

    public function updated($property)
    {
        if ($property === 'password_confirmation') {
            $this->validateOnly('password');
        }
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
