<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\TravelPackage;

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
	public $created_at;
	public $updated_at;
	public $deleted_at;
	
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";

    public function rules()
    {
        return [
			'id' => 'required',
			'title' => 'required',
			'slug' => 'required',
			'about' => 'required',
			'featured_event' => 'required',
			'language' => 'required',
			'foods' => 'required',
			'country_id' => 'required',
			'created_at' => 'required',
			'updated_at' => 'required',
			'deleted_at' => 'required',
			];
    }

    private function data()
    {
        return [
			'id' => $this->id,
			'title' => $this->title,
			'slug' => $this->slug,
			'about' => $this->about,
			'featured_event' => $this->featured_event,
			'language' => $this->language,
			'foods' => $this->foods,
			'country_id' => $this->country_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'deleted_at' => $this->deleted_at,
			];
    }

    public function create()
    {
        		$this->idTravelPackage = '';
		$this->id = '';
		$this->title = '';
		$this->slug = '';
		$this->about = '';
		$this->featured_event = '';
		$this->language = '';
		$this->foods = '';
		$this->country_id = '';
		$this->created_at = '';
		$this->updated_at = '';
		$this->deleted_at = '';
		
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $data = TravelPackage::find($id);
        $this->idTravelPackage = $id;
        		$this->id = $data->id;
		$this->title = $data->title;
		$this->slug = $data->slug;
		$this->about = $data->about;
		$this->featured_event = $data->featured_event;
		$this->language = $data->language;
		$this->foods = $data->foods;
		$this->country_id = $data->country_id;
		$this->created_at = $data->created_at;
		$this->updated_at = $data->updated_at;
		$this->deleted_at = $data->deleted_at;
		
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
            return TravelPackage::where('id', 'like', '%' . $this->search . '%')
				->orWhere('title', 'like', '%' . $this->search . '%')
				->orWhere('slug', 'like', '%' . $this->search . '%')
				->orWhere('about', 'like', '%' . $this->search . '%')
				->orWhere('featured_event', 'like', '%' . $this->search . '%')
				->orWhere('language', 'like', '%' . $this->search . '%')
				->orWhere('foods', 'like', '%' . $this->search . '%')
				->orWhere('country_id', 'like', '%' . $this->search . '%')
				->orWhere('created_at', 'like', '%' . $this->search . '%')
				->orWhere('updated_at', 'like', '%' . $this->search . '%')
				->orWhere('deleted_at', 'like', '%' . $this->search . '%')

                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return TravelPackage::orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["travel_packages"] = $this->read();
        $data["count_data"] = TravelPackage::count();
        return view('livewire.travel_package-component', $data)->layout("layouts.admin.template");
    }
}
