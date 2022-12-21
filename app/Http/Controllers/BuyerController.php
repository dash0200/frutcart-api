<?php

namespace App\Http\Controllers;

use App\Models\Ratechart;
use App\Models\User;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function getSellers() {

        $sellers = User::where('user_type', 1)->select('id', 'name')->get(); //user_type 1 means 'seller'
        return response()->json($sellers);
    }

    public function getChart(Request $req) {
        $chart = Ratechart::where('user_id', $req->user_id)->get();

        return response()->json($chart);
    }
}
