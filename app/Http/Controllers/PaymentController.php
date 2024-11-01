<?php

namespace App\Http\Controllers;

use App\Enums\Party\Reservation\ReservationStatus;
use App\Models\Party\PartyReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function createPayment(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'reservation_id' => 'required|exists:party_reservations,id',
            'amount' => 'required|numeric',
            'currency' => 'required|string|max:3', 
            'source' => 'required|string' 
        ]);

        $reservation = PartyReservation::findOrFail($request->reservation_id);

        $payment = Payment::create([
            'reservation_id' => $reservation->id,
            'source' => $request->source,
            'payment_number' => uniqid('pay_'), 
            'cur' => $request->currency,
            'amount' => $request->amount,
            'description' => 'Party reservation payment',
            'status' => 0 
        ]);

        $response = Http::withBasicAuth(env('MOYASAR_API_KEY'), '')
            ->post('https://api.moyasar.com/v1/payments', [
                'amount' => $request->amount * 100, 
                'currency' => $request->currency,
                'source' => [
                    'type' => $request->source, 
                    'payment_number' => $payment->payment_number
                ],
                'description' => 'Payment for reservation ' . $reservation->reservation_number
            ]);

        if ($response->successful()) {
            $payment->update([
                'payment_guid' => $response['id'], 
                'status' => 1 
            ]);

            $reservation->update(['status' => ReservationStatus::RESERVED->value]);

            return response()->json([
                'message' => 'Payment successful',
                'data' => $payment
            ], 200);
        } else {
            return response()->json([
                'message' => 'Payment failed',
                'error' => $response->body()
            ], 500);
        }
    }
}
