<?php

namespace App\Http\Livewire;

use App\Models\TravelPackage;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Country;
use Livewire\Component;

class TravelPackageComponent extends Component
{
    use WithPagination;

    public $idTravelPackage;
    public $title;
    public $slug;
    public $about;
    public $featured_event;
    public $language;
    public $foods;
    public $country_id;
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";

    public function rules()
    {
        return [
            'title' => 'required',
            'about' => 'required',
            'featured_event' => 'required',
            'language' => 'required',
            'foods' => 'required',
            'country_id' => 'required',
        ];
    }

    private function data()
    {
        return [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'about' => $this->about,
            'featured_event' => $this->featured_event,
            'language' => $this->language,
            'foods' => $this->foods,
            'country_id' => $this->country_id,
        ];
    }

    public function create()
    {
        $this->idTravelPackage = '';
        $this->title = '';
        $this->slug = '';
        $this->about = '';
        $this->featured_event = '';
        $this->language = '';
        $this->foods = '';
        $this->country_id = '';
        $this->isEdit = false;
        $this->emit("countryId", $this->country_id);
        $this->resetValidation();
    }

    public function edit($id)
    {
        $data = TravelPackage::find($id);
        $this->idTravelPackage = $id;
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->about = $data->about;
        $this->featured_event = $data->featured_event;
        $this->language = $data->language;
        $this->foods = $data->foods;
        $this->country_id = $data->country_id;
        $this->isEdit = true;
        $this->emit("countryId", $data->country_id);
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
        TravelPackage::create($this->data());
        $this->emit("btnSave", "Success Create Data!");
    }

    private function update()
    {
        $this->validate();
        TravelPackage::find($this->idTravelPackage)->update($this->data());
        $allData = $this->read();
        $this->gotoPage($allData->currentPage());
        $this->emit("btnSave", "Success Update Data!");
    }

    private function read()
    {
        if ($this->search) {
            return TravelPackage::with(['country'])
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%')
                ->orWhere('about', 'like', '%' . $this->search . '%')
                ->orWhere('featured_event', 'like', '%' . $this->search . '%')
                ->orWhere('language', 'like', '%' . $this->search . '%')
                ->orWhere('foods', 'like', '%' . $this->search . '%')
                ->orWhere('country_id', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return TravelPackage::with(['country'])
                ->orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["countries"] = Country::all();
        $data["travel_packages"] = $this->read();
        $data["count_data"] = TravelPackage::count();
        return view('livewire.travel-package-component', $data)->layout("layouts.admin.template");
    }
}
