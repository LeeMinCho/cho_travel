<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["travel_packages"] = TravelPackage::with(['galleries' => function ($query) {
            return $query->orderBy('id', 'desc');
        }])->latest()->limit(4)->get();
        return view('home', $data);
    }
}
