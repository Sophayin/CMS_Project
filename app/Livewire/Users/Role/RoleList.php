<?php

namespace App\Livewire\Users\Role;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{
    use WithPagination;
    public $limit = 12, $colump_name = 'name', $sort = 'desc';
    public $search;
    protected $queryString = ['apply', 'role_id'];
    public $apply;
    public $role_id;

    protected $listeners = ['refresh_role' => 'render'];
    public function render()
    {
        $this->apply = $this->apply;
        $this->role_id = $this->role_id;
        $roles = Role::where('id', '!=', 1)->orderBy($this->colump_name, $this->sort);
        if ($this->search) {
            $roles = $roles->where($this->colump_name, 'ilike', $this->search . '%');
        }
        $roles = $roles->paginate($this->limit);
        return view('livewire.users.role.role-list', ['roles' => $roles])->title("Apply Permission");
    }

    public function create_role_modal()
    {
        if (in_array('Create Role', session('user_permission')['Role'])) {
            $this->dispatch('modal.openModal');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }

    public function edit_role($roleId)
    {
        if (in_array('Edit Role', session('user_permission')['Role'])) {
            $this->dispatch('edit_role', roleId: $roleId);
            $this->dispatch('modal.openModalUpdate');
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }
    }

    public function apply_role_permission($role_id)
    {
        if (in_array('Set Permission', session('user_permission')['Role'])) {
            $this->redirect(route('role.apply_permission', ['role_id' => $role_id]), navigate: true);
        } else {
            $this->dispatch("alert.message", [
                'type' => 'warning',
                'message' => __("Access Denied! You don't have permission to access this function. Request access from your administrator")
            ]);
        }

        //$this->dispatch('modal.openModalApplyRole');
    }
}
