<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelOffer;

class DetailController extends Controller
{
    public function index($id)
    {
        $data['travel_offer'] = TravelOffer::with(['travelPackage'])->find($id);
        return view('detail-travel', $data);
    }
}
