<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;

class City extends Model
{
    //
    protected $table = "city";
    protected $primaryKey = "City_Id";
    protected $fillable = ["Name", "CountryCode", "District", "Population"];

    public $timestamps = false;
}
