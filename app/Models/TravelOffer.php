<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TravelOffer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["travel_package_id", "start_date", "end_date", "type", "caption", "min_quota", "max_quota", "trip_number", "price", "departure_from", "end_booking_date"];

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }
}
