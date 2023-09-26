<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with('pictures')->available(true)->recent()->limit(4)->get();
        // dump($properties->first()->created_at); // string thanks to the casts
        // dump($properties->first()->sold); // bool thanks to the casts
        // die;
        return view('default.home', ['properties' => $properties]);
    }
}
