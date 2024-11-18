<?php

namespace App\Models\Party;

use App\Enums\Facility\FStatus;
use App\Models\Facility\Facility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyFacilites extends Model
{
    use HasFactory;

    protected $table = 'party_facilities';

    protected $fillable = [
        'party_id',
        'facility_id',
        'status',
    ];

    protected $casts = [
        'status' => FStatus::class,
    ];

    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
