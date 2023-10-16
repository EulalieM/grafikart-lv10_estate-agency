<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\Picture;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;


class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    public function index()
    {
        // dd(Auth::user()->can('viewAny', Property::class));
        return view('admin.property.index', [
            'properties' => Property::orderBy('created_at', 'DESC')->withTrashed()->paginate(25)
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
        // dd(Auth::user()->can('delete', $property));
        // dd($this->authorize('delete', $property));
        return view('admin.property.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        $files = $request->validated('pictures') ?? [];
        $property->attachFiles($files);
        return to_route('admin.property.index')->with('success', 'Le bien a été modifié.');
    }

    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
        $property->delete(); // soft delete
        // $property->forceDelete();
        // $property->restore(); // deleted_at = null
        return to_route('admin.property.index')->with('success', 'Le bien a été supprimé.');
    }
}
