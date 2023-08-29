<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(16);
        return view('property.index', [
            'properties' => $properties
        ]);
    }

    public function show(string $slug, Property $property)
    {

    }
}
