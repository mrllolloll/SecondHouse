<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use User;
use View;

class Searchresult extends Model
{
    public function index()
    {	
    	return view('publicate.publications');
    }

    public function scopeSearch($pet, $city)
    {	

    }
}
