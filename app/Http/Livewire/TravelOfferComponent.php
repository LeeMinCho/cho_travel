<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\TravelOffer;

class TravelOfferComponent extends Component
{
    use WithPagination;

    public $idTravelOffer;
    	public $travel_package_id;
	public $start_date;
	public $end_date;
	public $type;
	public $caption;
	public $min_quota;
	public $max_quota;
	public $trip_number;
	public $price;
	public $departure_from;
	
    public $isEdit = false;
    public $search;

    protected $paginationTheme = "bootstrap";

    public function rules()
    {
        return [
			'travel_package_id' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'type' => 'required',
			'caption' => 'required',
			'min_quota' => 'required',
			'max_quota' => 'required',
			'trip_number' => 'required',
			'price' => 'required',
			'departure_from' => 'required',
			];
    }

    private function data()
    {
        return [
			'travel_package_id' => $this->travel_package_id,
			'start_date' => $this->start_date,
			'end_date' => $this->end_date,
			'type' => $this->type,
			'caption' => $this->caption,
			'min_quota' => $this->min_quota,
			'max_quota' => $this->max_quota,
			'trip_number' => $this->trip_number,
			'price' => $this->price,
			'departure_from' => $this->departure_from,
			];
    }

    public function create()
    {
        		$this->idTravelOffer = '';
		$this->travel_package_id = '';
		$this->start_date = '';
		$this->end_date = '';
		$this->type = '';
		$this->caption = '';
		$this->min_quota = '';
		$this->max_quota = '';
		$this->trip_number = '';
		$this->price = '';
		$this->departure_from = '';
		
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function edit($id)
    {
        $data = TravelOffer::find($id);
        $this->idTravelOffer = $id;
        		$this->travel_package_id = $data->travel_package_id;
		$this->start_date = $data->start_date;
		$this->end_date = $data->end_date;
		$this->type = $data->type;
		$this->caption = $data->caption;
		$this->min_quota = $data->min_quota;
		$this->max_quota = $data->max_quota;
		$this->trip_number = $data->trip_number;
		$this->price = $data->price;
		$this->departure_from = $data->departure_from;
		
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
        TravelOffer::create($this->data());
        $this->emit("btnSave", "Success Create Data!");
    }

    private function update()
    {
        $this->validate();
        TravelOffer::find($this->idTravelOffer)->update($this->data());
        $allData = $this->read();
        $this->gotoPage($allData->currentPage());
        $this->emit("btnSave", "Success Update Data!");
    }

    private function read()
    {
        if ($this->search) {
            return TravelOffer::where('travel_package_id', 'like', '%' . $this->search . '%')
				->orWhere('start_date', 'like', '%' . $this->search . '%')
				->orWhere('end_date', 'like', '%' . $this->search . '%')
				->orWhere('type', 'like', '%' . $this->search . '%')
				->orWhere('caption', 'like', '%' . $this->search . '%')
				->orWhere('min_quota', 'like', '%' . $this->search . '%')
				->orWhere('max_quota', 'like', '%' . $this->search . '%')
				->orWhere('trip_number', 'like', '%' . $this->search . '%')
				->orWhere('price', 'like', '%' . $this->search . '%')
				->orWhere('departure_from', 'like', '%' . $this->search . '%')

                ->orderBy('id', 'desc')
                ->paginate(5);
        } else {
            return TravelOffer::orderBy('id', 'desc')
                ->paginate(5);
        }
    }

    public function render()
    {
        $data["travel_offers"] = $this->read();
        $data["count_data"] = TravelOffer::count();
        return view('livewire.travel-offer-component', $data)->layout("layouts.admin.template");
    }
}
