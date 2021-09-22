<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Role;

class RoleComponent extends Component
{
    use WithPagination;

    public $id_role;
    public $name;
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";

    public function rules()
    {
        return [
            "name" => $this->isEdit ? "required|unique:roles,name," . $this->name : "required|unique:roles,name"
        ];
    }

    private function data()
    {
        return [
            "name" => $this->name
        ];
    }

    public function create()
    {
        $this->id_role = "";
        $this->name = "";
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $this->id_role = $id;
        $this->name = $role->name;
        $this->isEdit = true;
        $this->resetValidation();
    }

    public function buttonSave()
    {
        if ($this->isEdit == false) {
            $this->store();
        } else {
            $this->update();
        }
    }

    private function store()
    {
        $this->validate();
        Role::create($this->data());
        $this->emit("btnSave", "Success Create Data!");
    }

    private function update()
    {
        $this->validate();
        Role::find($this->id_role)->update($this->data());
        $allData = $this->read();
        $this->gotoPage($allData->currentPage());
        $this->emit("btnSave", "Success Update Data!");
    }

    private function read()
    {
        if ($this->search) {
            return Role::where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return Role::orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["roles"] = $this->read();
        $data["count_data"] = Role::count();
        return view('livewire.admin.role-component', $data)->layout("layouts.admin.template");
    }
}
