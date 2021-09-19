<?php

namespace App\Http\Livewire;

use App\Models\TravelPackage;
use Livewire\WithPagination;
use App\Models\TravelOffer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Livewire\Component;

class TravelPackageFrontComponent extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function read()
    {
        if ($this->search) {
            return TravelOffer::with(['travelPackage' => function ($query) {
                return $query->with('galleries', function ($query) {
                    return $query->orderBy('id', 'desc');
                });
            }])
                ->where(function ($query) {
                    $query->whereHas('travelPackage', function ($query) {
                        return $query->where('title', 'like', '%' . $this->search . '%');
                    })
                        ->orWhereHas('country', function ($query) {
                            return $query->where('name', 'like', '%' . $this->search . '%');
                        });
                })
                ->where('end_date', '>=', date('Y-m-d'))
                ->orderBy('start_date', 'asc')
                ->paginate(8);
        } else {
            return TravelOffer::with(['travelPackage' => function ($query) {
                return $query->whereHas('galleries', function ($query) {
                    return $query->orderBy('id', 'desc');
                });
            }])
                ->where('end_date', '>=', date('Y-m-d'))
                ->orderBy('start_date', 'asc')
                ->paginate(8);
        }
    }

    public function render()
    {
        $data["travel_offers"] = $this->read();
        $data["count_data"] = TravelOffer::count();
        return view('livewire.travel-package-front-component', $data)->extends('layouts.frontend.template');
    }
}
