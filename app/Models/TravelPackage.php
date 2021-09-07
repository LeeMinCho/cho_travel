<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["title", "slug", "about", "featured_event", "language", "foods", "country_id"];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
