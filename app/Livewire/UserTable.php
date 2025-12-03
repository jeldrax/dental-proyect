<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserTable extends Component
{
    public $showModal = false;
    public $isEditing = false;
    public $userId;
    public $name;
    public $email;
    public $userRole;
    public $roles;
    public $password = '';

    protected function rules()
    {
        $rules = [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->userId)],
            'userRole' => 'required|string|exists:roles,name',
        ];

        if (!$this->isEditing) {
            $rules['password'] = 'required|string|min:8';
        }

        return $rules;
    }

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        $users = User::with('roles')->get();
        return view('livewire.user-table', compact('users'));
    }

    public function createUser()
    {
        if (auth()->user()->cannot('admin.users.create')) {
            $this->dispatch('show-swal-error', 'No tienes permiso para crear usuarios.');
            return;
        }
        $this->isEditing = false;
        $this->reset(['userId', 'name', 'email', 'password', 'userRole']);
        $this->userRole = 'Paciente'; // Default role
        $this->showModal = true;
    }

    public function editUser(User $user)
    {
        if (auth()->user()->cannot('admin.users.edit')) {
            $this->dispatch('show-swal-error', 'No tienes permiso para editar usuarios.');
            return;
        }
        $this->isEditing = true;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userRole = $user->roles->first()->name ?? '';
        $this->showModal = true;
    }

    public function saveUser()
    {
        $permission = $this->isEditing ? 'admin.users.edit' : 'admin.users.create';
        if (auth()->user()->cannot($permission)) {
            $this->dispatch('show-swal-error', 'No tienes los permisos necesarios.');
            return;
        }

        $validatedData = $this->validate();

        if ($this->isEditing) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $user->syncRoles($this->userRole);
            $this->dispatch('show-swal-success', 'Usuario actualizado correctamente.');
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $user->syncRoles($this->userRole);
            $this->dispatch('show-swal-success', 'Usuario creado correctamente.');
        }

        $this->showModal = false;
    }

    #[On('delete-confirmed')]
    public function deleteUser($id)
    {
        if (auth()->user()->cannot('admin.users.delete')) {
            $this->dispatch('show-swal-error', 'No tienes permiso para eliminar usuarios.');
            return;
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->dispatch('show-swal-success', 'El usuario ha sido eliminado correctamente.');
        }
    }
}
