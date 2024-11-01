<?php

namespace App\Models;

use App\Models\Party\PartyReservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'payment_number',
        'payment_guid',
        'cur',
        'amount',
        'description',
        'status',
        'reservation_id'
    ];
    public function reservation()
    {
        return $this->belongsTo(PartyReservation::class);
    }
}
