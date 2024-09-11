<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{States, Cities};

class DependentController extends Controller
{
    public function getStates(Request $request)
    {
        $countryId = $request->input('country_id');
        logger($countryId);
        $states = States::where('country_id', $countryId)->get();

        logger($states);
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $stateId = $request->input('state_id');
        $cities = Cities::where('state_id', $stateId)->get();

        return response()->json($cities);
    }
}
