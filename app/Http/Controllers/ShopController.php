<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        if (!$shops) {
            return response()->json(['error' => 'There are no shops'], 404);
        }
        return response()->json($shops);
    }
    
    public function show($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        return response()->json($shop);
    }
    public function store(Request $request)
    {
        $request->validate([
            'shopname' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $shop = Shop::create([
            'shopname' => $request->input('shopname'),
            'address' => $request->input('address'),
        ]);
        if (!$shop) {
            return response()->json(['error' => 'Failed to create shop'], 404);
        }

        return response()->json(['message' => 'Shop created successfully'], 200);
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['error' => 'Shop not found'], 404);
        }

        $request->validate([
            'shopname' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $shop->shopname = $request->input('shopname');
        $shop->address = $request->input('address', $shop->address);
        $shop->save();

        return response()->json(['message' => 'Shop updated successfully'], 200);
    }

    public function destroy($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return response()->json(['error' => 'Shop not found'], 404);
        }

        $shop->delete();

        return response()->json(['message' => 'Shop deleted successfully']);
    }
}
