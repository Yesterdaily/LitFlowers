<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;
use App\Models\Catalogue;
use App\Models\Shop;
use Illuminate\Http\Response;

class FlowerController extends Controller
{
    public function index($shopId, $catalogueId)
{
    // Find the shop by ID
    $shop = Shop::find($shopId);

    if (!$shop) {
        return response()->json(['error' => 'Shop not found'], 404);
    }

    // Check if the catalogue belongs to the specified shop
    $catalogue = $shop->catalogues()->find($catalogueId);

    if (!$catalogue) {
        return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
    }

    // Retrieve flowers based on catalogueId
    $flowers = Flower::where('catalogue_id', $catalogueId)->get();
    if (!$flowers) {
        return response()->json(['error' => 'flowers not found for the specified catalogue'], 404);
    }
    return response()->json($flowers, Response::HTTP_OK);
}

    public function indexAll()
    {
        $flowers = Flower::all();
        if (!$flowers) {
            return response()->json(['error' => 'No flowers found'], 404);
        }
        return response()->json($flowers);
    }


    public function store(Request $request, $catalogue_id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
           // 'catalogue_id' => 'required|exists:catalogues,id',
        ]);

        $catalogue = Catalogue::find($catalogue_id);

        if (!$catalogue) {
            return response()->json(['message' => 'Catalogue not found'], 404);
        }

        $data['catalogue_id'] = $catalogue->id;

        $flower = new Flower($data);
        $flower->catalogue_id = $catalogue->id;
        $flower->save();
    

        //Flower::create($data);

        return response()->json($flower, Response::HTTP_CREATED);
    }

    public function show($shopId, $catalogueId, $flowerId)
    {
        // Find the shop by ID
        $shop = Shop::find($shopId);
    
        if (!$shop) {
            return response()->json(['error' => 'Shop not found'], 404);
        }
    
        // Find the catalogue by ID and check if it belongs to the specified shop
        $catalogue = $shop->catalogues()->find($catalogueId);
    
        if (!$catalogue) {
            return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
        }
    
        // Find the flower by ID and check if it belongs to the specified catalogue
        $flower = $catalogue->flowers()->find($flowerId);
    
        if (!$flower) {
            return response()->json(['error' => 'Flower not found for the specified Catalogue'], 404);
        }
    
        return response()->json($flower, Response::HTTP_OK);
    }
    
    

    public function update(Request $request, $shopId, $catalogueId, $flowerId)
    {
        // Find the shop by ID
        $shop = Shop::find($shopId);
    
        if (!$shop) {
            return response()->json(['error' => 'Shop not found'], 404);
        }
    
        // Check if the catalogue belongs to the specified shop
        $catalogue = $shop->catalogues()->find($catalogueId);
    
        if (!$catalogue) {
            return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
        }
    
        // Find the flower by ID and check if it belongs to the specified catalogue
        $flower = $catalogue->flowers()->find($flowerId);
    
        if (!$flower) {
            return response()->json(['error' => 'Flower not found for the specified Catalogue'], 404);
        }
    
        // Update the fields
        $flower->name = $request->input('name');
        $flower->description = $request->input('description');
        $flower->price = $request->input('price');
        $flower->image_url = $request->input('image_url');
    
        // Save the updated model
        $flower->save();
    
        return response()->json(['message' => 'Flower updated successfully'], 200);
    }
    

    public function destroy($shopId, $catalogueId, $flowerId)
    {
        // Find the shop by ID
        $shop = Shop::find($shopId);
    
        if (!$shop) {
            return response()->json(['error' => 'Shop not found'], 404);
        }
    
        // Check if the catalogue belongs to the specified shop
        $catalogue = $shop->catalogues()->find($catalogueId);
    
        if (!$catalogue) {
            return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
        }
    
        // Find the flower by ID and check if it belongs to the specified catalogue
        $flower = $catalogue->flowers()->find($flowerId);
    
        if (!$flower) {
            return response()->json(['error' => 'Flower not found for the specified Catalogue'], 404);
        }
    
        // Delete the flower
        $flower->delete();
    
        return response()->json(['message' => 'Flower deleted successfully'], 204);
    }
    
}
