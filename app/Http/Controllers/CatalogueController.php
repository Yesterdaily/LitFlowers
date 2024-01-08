<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Shop;
use Illuminate\Http\Response;

class CatalogueController extends Controller
{
    public function index($shopId)
    {
        $catalogues = Catalogue::where('shop_id', $shopId)->get();
        if (!$catalogues) {
            return response()->json(['message' => 'Catalogue not found'], 404);
        }
        return response()->json($catalogues, Response::HTTP_OK);
    }
    public function indexAll()
    {
        $catalogues = Catalogue::all();
        if (!$catalogues) {
            return response()->json(['message' => 'Catalogue not found'], 404);
        }
        return response()->json($catalogues);
    }

    public function create()
    {
        return view('catalogues.create');
    }

    public function store(Request $request, $shopId)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
    
        // Ensure that the shop with the specified ID exists
        $shop = Shop::find($shopId);
    
        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], Response::HTTP_NOT_FOUND);
        }
    
        // Set the shop_id in the data array
        $data['shop_id'] = $shop->id;
    
        // Create a new catalogue associated with the shop
        $catalogue = new Catalogue($data);
        $catalogue->shop_id = $shop->id;
        $catalogue->save();
    
        return response()->json($catalogue, Response::HTTP_CREATED);
    }
    


    public function show($shopId, $catalogueId)
    {
        // Find the shop by ID
        $shop = Shop::find($shopId);
    
        if (!$shop) {
            // Check if the request is from the web or an API
                return response()->json(['error' => 'Shop not found'], 404); 
        }
    
        // Find the catalogue by ID and check if it belongs to the specified shop
        $catalogue = $shop->catalogues()->find($catalogueId);
    
        if (!$catalogue) {
            // Check if the request is from the web or an API
                return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
            
        }
    
        // Check if the request is from the web or an API
        
        return response()->json($catalogue, Response::HTTP_OK);
        
    }

    public function update(Request $request, $shopId, $catalogueId)
{
    $shop = Shop::find($shopId);
    
        if (!$shop) {
            // Check if the request is from the web or an API
                return response()->json(['error' => 'Shop not found'], 404); 
        }
        $catalogue = $shop->catalogues()->find($catalogueId);
    
        if (!$catalogue) {
            // Check if the request is from the web or an API
                return response()->json(['error' => 'Catalogue not found for the specified shop'], 404);
            
        }
    // Find the Catalogue model by ID
    //$catalogue = Catalogue::find($catalogue_id);
    //return response()->json($catalogue, Response::HTTP_CREATED);
    if (!$catalogue) {
        return response()->json(['message' => 'Catalogue not found'], 404);
    }

    // Update the fields
    $catalogue->name = $request->input('name');
    $catalogue->description = $request->input('description');

    // Save the updated model
    $catalogue->save();

    return response()->json(['message' => 'Catalogue updated successfully'], 200);
}

public function destroy($catalogue_id)
{
    $catalogue = Catalogue::find($catalogue_id);

    if (!$catalogue) {
        return response()->json(['message' => 'Catalogue not found'], 404);
    }

    $catalogue->delete();

    return response()->json(['message' => 'Catalogue deleted']);
}
}
