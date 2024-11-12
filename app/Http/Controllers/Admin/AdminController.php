<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Party\PartyReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Moyasar\Moyasar;

class AdminController extends Controller
{
    public function index()
    {
        $totalCollected = PartyReservation::sum('price_after_discount');
        return view("admin.index", compact("totalCollected"));
    }
    public function totalCollected()
    {
        $totalCollected = PartyReservation::sum('price_after_discount');

        return view('admin.total_collected', compact('totalCollected'));
    }
    public function processPayment(Request $request)
    {
        // Moyasar API URL
        $url = 'https://api.moyasar.com/v1/payments';

        // Payment request data
        $response = Http::withBasicAuth(config('services.moyasar.key'), '')
            ->post($url, [
                'amount' => $request->input('amount') * 100, // Amount in halalas (1 SAR = 100 halalas)
                'currency' => 'SAR',
                'source' => [
                    'type' => 'creditcard',
                    'name' => $request->input('name'),
                    'number' => $request->input('number'),
                    'cvc' => $request->input('cvc'),
                    'month' => $request->input('month'),
                    'year' => $request->input('year'),
                ],
                'description' => 'Admin collected amount',
            ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Payment processed successfully!');
        } else {
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }
}
