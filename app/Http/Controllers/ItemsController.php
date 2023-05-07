<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ItemsController extends Controller
{

    public function index()
{
    $items = Products::all();
    return response()->json($items);
}

public function store(Request $request)
{
    $items = new Products;
    $items->name = $request->name;
    $items->description = $request->description;
    $items->price = $request->price;
    $items->save();
    return response()->json($items);
}

public function update(Request $request, $id)
{
    $items = Products::find($id);
    $items->name = $request->name;
    $items->description = $request->description;
    $items->price = $request->price;
    $items->save();

    return response()->json($items);
}

public function destroy($id)
{
    $items = Products::find($id);
    $items->delete();

    return response()->json('Product deleted');
}

}
