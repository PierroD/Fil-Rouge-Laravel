<?php

namespace App\Http\Controllers;

class GreetingController extends Controller
{
    public function sayHello($name)
    {
        // return view('hello', compact("name"));
        return view('hello')->with('name', $name);
    }
    public function showCities($id)
    {
        $cities = array("foo", "bar", "hello", "world");
        return view('cities', compact("cities"));
        // return view('cities')->with('');
    }
}
