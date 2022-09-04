<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ProductApiController extends Controller
{

    public function addProductStock(Request $request)
    {
        $authUser = $request->user();

        $productIds = Product::all()->random(3)->pluck('id')->all();

        Product::whereIn('id', $productIds)->increment('stock', '1');

        return response()->json(["message" => "Stock In For 3 Products"], Response::HTTP_OK);
    }

    public function reduceProductStock(Request $request)
    {
        $authUser = $request->user();
        $productIds = Product::all()->random(3)->pluck('id')->all();

        Product::whereIn('id', $productIds)->decrement('stock', '1');

        return response()->json(["message" => "Stock Out For 3 Products"], Response::HTTP_OK);
    }

}
