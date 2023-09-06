<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Picture;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;


class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.property.index', [
            'properties' => Property::orderBy('created_at', 'DESC')->paginate(25)
        ]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Angoulême',
            'postal_code' => 16000,
            'sold' => false
        ]);

        return view('admin.property.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        $property->attachFiles($request->validated('pictures'));
        return to_route('admin.property.index')->with('success', 'Le bien a été ajouté.');
    }

    public function edit(Property $property)
    {
        return view('admin.property.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        $property->attachFiles($request->validated('pictures'));
        return to_route('admin.property.index')->with('success', 'Le bien a été modifié.');
    }

    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé.');
    }
}
