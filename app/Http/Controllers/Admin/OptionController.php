<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Http\Requests\Admin\OptionFormRequest;


class OptionController extends Controller
{
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::paginate(25)
        ]);
    }

    public function create()
    {
        $option = new Option();
        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option bien a été ajoutée.');
    }

    public function edit(Option $option)
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a été modifiée.');
    }

    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'L\'option a été supprimée.');
    }
}
