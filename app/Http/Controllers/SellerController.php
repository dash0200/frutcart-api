<?php

namespace App\Http\Controllers;

use App\Models\Ratechart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function store(Request $req) {
        $req->validate([
            'type' => ['required'],
            'rate' => ['required', 'numeric',  'gt:0'],
            'unit' => ['required']
        ]);

        try {
            $chart = Ratechart::create([
                'type' => $req->type,
                'rate' => $req->rate,
                'unit' => $req->unit,
                'description' => $req->description,
                'user_id' => Auth::user()->id
            ]);

            return response()->json($chart);
        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }

    }

    public function getProducts(Request $req) {
        $oranges = Ratechart::where('user_id', Auth::user()->id)->get();
        return response()->json(['oranges' => $oranges]);
    }

    public function updateProducts(Request $req) {
        $req->validate([
            'type' => ['required'],
            'rate' => ['required', 'numeric',  'gt:0'],
            'unit' => ['required']
        ]);

        try {
            Ratechart::where('id', $req->id)->update([
                'type' => $req->type,
                'rate' => $req->rate,
                'unit' => $req->unit,
                'description' => $req->desc,
            ]);

            return response()->json('Product Updated');
        } catch(\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
