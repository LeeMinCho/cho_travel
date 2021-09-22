<?php

namespace App\Http\Livewire\Admin;

use App\Models\TravelPackage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Gallery;

class GalleryComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $idGallery;
    public $travel_package_id;
    public $image;
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";
    protected $listeners = ["deleteImage"];

    public function rules()
    {
        return [
            'travel_package_id' => 'required',
            'image' => 'required|image|max:1024',
        ];
    }

    private function data()
    {
        return [
            'travel_package_id' => $this->travel_package_id,
            'image' => $this->image,
        ];
    }

    public function create()
    {
        $this->idGallery = '';
        $this->travel_package_id = '';
        $this->image = '';
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $data = Gallery::find($id);
        $this->idGallery = $id;
        $this->travel_package_id = $data->travel_package_id;
        $this->image = $data->image;
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
        $this->image = $this->image->store('images');
        Gallery::create($this->data());
        $this->emit("btnSave", "Success Create Data!");
    }

    private function update()
    {
        $this->validate();
        Gallery::find($this->idGallery)->update($this->data());
        $allData = $this->read();
        $this->gotoPage($allData->currentPage());
        $this->emit("btnSave", "Success Update Data!");
    }

    public function deleteImage($id)
    {
        Gallery::destroy($id);
        $this->emit("btnSave", "the Image has been deleted");
    }

    private function read()
    {
        if ($this->search) {
            return Gallery::with(['travelPackage'])
                ->whereHas("travelPackage", function ($query) {
                    return $query->where("title", "like", "%" . $this->search . "%");
                })
                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return Gallery::with(['travelPackage'])
                ->orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["travel_packages"] = TravelPackage::all();
        $data["galleries"] = $this->read();
        $data["count_data"] = Gallery::count();
        return view('livewire.admin.gallery-component', $data)->layout("layouts.admin.template");
    }
}
