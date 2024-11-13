<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility\Facility;
use App\Models\Party\Party;
use App\Models\Party\PartyFacilites;
use Illuminate\Http\Request;

class PartyFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = PartyFacilites::all();
        return view('admin.party_facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::all();
        $facilities = Facility::all();
        return view('admin.party_facilities.create', compact('parties'  , 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'party_id' => 'required',
            'facility_id' => 'required',
            'status' => 'required|boolean',
        ]);

        PartyFacilites::create($validated);

        return redirect()->route('admin.party_facilities.index')->with('success', 'تم إضافة المنشأة بنجاح');
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
    public function edit(PartyFacilites $partyFacility)
    {
        $parties = Party::all();
        $facilities = Facility::all();

        return view('admin.party_facilities.edit', compact('partyFacility' ,'parties', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartyFacilites $partyFacility)
    {
        $validated = $request->validate([
            'party_id' => 'required',
            'facility_id' => 'required',
            'status' => 'required|boolean',
        ]);

        $partyFacility->update($validated);

        return redirect()->route('admin.party_facilities.index')->with('success', 'تم تحديث المنشأة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartyFacilites $partyFacility)
    {
        $partyFacility->delete();
        return redirect()->route('admin.party_facilities.index')->with('success', 'تم حذف المنشأة بنجاح');
    }
}
