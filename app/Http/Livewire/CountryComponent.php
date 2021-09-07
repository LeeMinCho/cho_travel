<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Country;

class CountryComponent extends Component
{
    use WithPagination;

    public $idCountry;
    public $code;
    public $name;
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";

    public function rules()
    {
        return [
            'code' => $this->isEdit ? 'required|unique:countries,code,' . $this->code : "required|unique:countries,code",
            'name' => 'required',
        ];
    }

    private function data()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
        ];
    }

    public function create()
    {
        $this->idCountry = '';
        $this->code = '';
        $this->name = '';
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $data = Country::find($id);
        $this->idCountry = $id;
        $this->code = $data->code;
        $this->name = $data->name;
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
        Country::create($this->data());
        $this->emit("btnSave", "Success Create Data!");
    }

    private function update()
    {
        $this->validate();
        Country::find($this->idCountry)->update($this->data());
        $allData = $this->read();
        $this->gotoPage($allData->currentPage());
        $this->emit("btnSave", "Success Update Data!");
    }

    private function read()
    {
        if ($this->search) {
            return Country::where('code', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return Country::orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["countries"] = $this->read();
        $data["count_data"] = Country::count();
        return view('livewire.country-component', $data)->layout("layouts.admin.template");
    }
}
