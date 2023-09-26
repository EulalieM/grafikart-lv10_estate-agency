<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with('pictures')->available(true)->recent()->limit(4)->get();
        return view('default.home', ['properties' => $properties]);
    }
}
