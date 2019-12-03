<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class Country extends Model
{
    //
    protected $table = "country";

    protected $primaryKey = "Country_Id";
    public $timestamps = false;



    public function capital()
    {
        return $this->hasOne(City::class, 'City_Id', 'Capital');
    }
    public function cities()
    {
        return $this->hasMany(City::class, 'CountryCode', 'Code');
    }
}
