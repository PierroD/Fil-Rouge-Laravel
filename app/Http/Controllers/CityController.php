<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;

class CityController extends Controller
{
    //
    public function find($id)
    {
        $city = City::find($id);
        $country = Country::where('Code', $city->CountryCode)->first();
        return view('city', compact('city', 'country'));
    }
    public function getAll()
    {
        $cities = City::all();
        return view('cities', compact('cities'));
    }
}
