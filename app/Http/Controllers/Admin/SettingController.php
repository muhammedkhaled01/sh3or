<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $discount = Discount::first();

        $totalCollected = \App\Models\Party\PartyReservation::sum('price'); // Total collected before discount
        $priceAfterDiscount = $totalCollected * (1 - ($discount->discount / 100));

        return view('admin.settings.index', compact('discount', 'totalCollected', 'priceAfterDiscount'));
    }

    /**
     * Update the discount rate.
     */
    public function update(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        $discount = Discount::firstOrCreate();
        $discount->update(['discount' => $request->discount]);

        return redirect()->route('admin.settings.index')->with('success', 'Discount rate updated successfully.');
    }
}
