<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('path')) {
            $path = $request->file('path')->store('public/cities');
            $validated['path'] = Storage::url($path);
        }
        City::create($validated);

        return redirect()->route('admin.cities.index')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('path')) {
            if ($city->path) {
                Storage::delete(str_replace('/storage/', 'public/', $city->path));
            }
            $path = $request->file('path')->store('public/cities');
            $validated['path'] = Storage::url($path);
        }
        $city->update($validated);

        return redirect()->route('admin.cities.index')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        if ($city->path) {
            Storage::delete(str_replace('/storage/', 'public/', $city->path));
        }
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success', 'City deleted successfully');
    }
}
