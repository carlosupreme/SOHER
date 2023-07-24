<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user;
    public $open;
    public $nombre;
    public $correo;
    public $roles;
    public $rolesOptions;

    protected $listeners = ['editUser'];

    public function mount()
    {
        $this->open = false;
        $this->roles = [];
        $this->rolesOptions = Role::all(['id', 'name'])->toArray();
    }

    public function editUser($id)
    {
        $this->user = User::findOrFail($id);
        $this->nombre = $this->user->name;
        $this->correo = $this->user->email;
        $this->user->roles->each(fn($role) => $this->roles[] = $role->id);
        $this->open = true;
    }

    public function updateUser()
    {
        $this->validate([
            'roles' => 'required',
            'nombre' => [
                'required',
                Rule::unique('users', 'name')->ignoreModel($this->user)
            ],
            'correo' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignoreModel($this->user)
            ]
        ]);

        $this->user->name = $this->nombre;
        $this->user->email = $this->correo;
        $this->user->roles()->sync($this->roles);
        $this->user->save();
        return redirect()->route('user.index')->with('flash.banner', 'Usuario editado correctamente');
    }

    public function updated($property)
    {
        $this->validateOnly($property, [
            'roles' => 'required',
            'nombre' => [
                'required',
                Rule::unique('users', 'name')->ignoreModel($this->user)
            ],
            'correo' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignoreModel($this->user)
            ]
        ]);
    }

    public function resetValues()
    {
        $this->resetExcept('rolesOptions');
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}
