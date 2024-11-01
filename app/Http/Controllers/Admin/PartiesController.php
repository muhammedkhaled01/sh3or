<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party\Party;
use Illuminate\Http\Request;

class PartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inactiveParties()
    {
        $parties = Party::where('status', 0)->orderBy('id', 'desc')->paginate(10);
        return view('admin.parties.inactive', compact('parties'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function activate($id)
    {
        $party = Party::findOrFail($id);
        $party->update(['status' => 1]);

        return redirect()->route('admin.parties.inactive')->with('success', 'تم تفعيل الحفلة بنجاح');
    }
    public function index()
    {
        $parties = Party::orderBy('id', 'desc')->paginate(10);
        return view('admin.parties.index', compact('parties'));
    }

    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $party = Party::findOrFail($id);
        $party->delete();

        return redirect()->route('admin.parties.index')->with('success', 'تم حذف الحفلة بنجاح');
    }
}
