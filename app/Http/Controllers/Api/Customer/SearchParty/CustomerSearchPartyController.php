<?php

namespace App\Http\Controllers\Api\Customer\SearchParty;

use App\Http\Controllers\Controller;
use App\Models\Party\Party;
use App\Models\Party\PartyRate;
use App\Models\Party\PartyWishlist;
use App\Models\Slider\Silder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerSearchPartyController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::guard('api')->user();

        $partiesData = DB::table('parties')
            ->join('party_categories', 'parties.catgory_id', '=', 'party_categories.id')
            ->join('party_preparation_times', 'parties.id', '=', 'party_preparation_times.party_id')
            ->join('cities', 'parties.city_id', '=', 'cities.id')
            ->leftJoin('party_media', function ($join) {
                $join->on('parties.id', '=', 'party_media.party_id')
                    ->where('party_media.type', 0);
            })
            ->select(
                'parties.id as partyId',
                'parties.name as partyName',
                'cities.name as cityName',
                DB::raw('MIN(party_media.path) as partImage') // Get one record for party_media
                // Get one record for party_media
            )
            ->where('cities.id', $request->cityId)
            ->where('cities.status', 1)
            ->where('party_categories.id', $request->categoryId)
            ->where('party_categories.status', 1)
            ->where('party_preparation_times.preparation_time_id', $request->preparationTimeId)
            ->where('party_preparation_times.status', 1)
            ->where('parties.status', 1)
            ->groupBy('parties.id', 'parties.name', 'cities.name') // Group by party details
            ->get();

        $parties = [];

        foreach ($partiesData as $party) {
            $averageRate = PartyRate::where('party_id', $party->partyId)
            ->avg('rate');
            $inWishlist = PartyWishlist::where('party_id', $party->partyId)->where('customer_id', $user->id)->exists();
            $price = Party::find($party->partyId)->activePrice();
            $parties[] = [
                'partyId' => $party->partyId,
                'partyName' => $party->partyName,
                'cityName' => $party->cityName,
                'price' => $price,
                'partyImage' => $party->partImage,
                'rate' => round($averageRate, 2),
                'inWishlist' => $inWishlist == true?1:0
            ];
        }



        return response()->json([
            'data' => [
                'parties' => $parties
            ]
        ]);
    }

}
