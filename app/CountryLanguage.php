<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    //
    protected $table = "countrylanguage";

    protected $primaryKey = "CountryLanguage_Id";
    public $timestamps = false;
}
