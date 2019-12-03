<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\CountryLanguage;

class CountryController extends Controller
{
    //
    public function find($id)
    {
        $country = Country::find($id);
        return view('country', compact('country'));
    }

    public function getCitiesFromCountry($id)
    {
        $country = Country::find($id);
        $cities = City::where('CountryCode', $country->Code)->where('Population', '>', 100000)->get();
        //$count = City::where('CountryCode', $country->Code)->get()->count(); //* ou
        //$count = count($cities); //*ou
        $count = $cities->count();
        return view('cities', compact('cities', 'count'));
    }

    public function getCountriesFromContinent($Continent)
    {
        $countries = Country::where('Continent', $Continent)->has('capital')->with('capital')->get();
        $count = $countries->count();
        $continent = $Continent;
        return view('countries', compact('countries', 'count', 'continent'));
    }

    public function getCountry($id)
    {
        $country = Country::find($id);
        $count = $country->cities()->count();
        $cities = $country->cities;
        $countrylanguage = CountryLanguage::where('CountryCode', $country->Code)->get();
        return view('country', compact('country', 'count', 'cities', 'countrylanguage'));
    }
}
