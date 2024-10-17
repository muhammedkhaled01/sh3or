<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party\PartyCategory;
use Illuminate\Http\Request;

class PartyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PartyCategory::all();
        return view('admin.party_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.party_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        PartyCategory::create($validated);

        return redirect()->route('admin.party_categories.index')->with('success', 'تم إنشاء الفئة بنجاح');
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
    public function edit(PartyCategory $partyCategory)
    {
        return view('admin.party_categories.edit', compact('partyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartyCategory $partyCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $partyCategory->update($validated);

        return redirect()->route('admin.party_categories.index')->with('success', 'تم تحديث الفئة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartyCategory $partyCategory)
    {
        $partyCategory->delete();
        return redirect()->route('admin.party_categories.index')->with('success', 'تم حذف الفئة بنجاح');
    }
}