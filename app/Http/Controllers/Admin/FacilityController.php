<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facilities.create');
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
            $path = $request->file('path')->store('public/facilities');
            $validated['path'] = Storage::url($path);
        }
        Facility::create($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility created successfully');
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
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('path')) {
            if ($facility->path) {
                Storage::delete(str_replace('/storage/', 'public/', $facility->path));
            }
            $path = $request->file('path')->store('public/facilities');
            $validated['path'] = Storage::url($path);
        }
        $facility->update($validated);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        if ($facility->path) {
            Storage::delete(str_replace('/storage/', 'public/', $facility->path));
        }
        $facility->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Facility deleted successfully');
    }
}
