<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{

    public function index()
    {
        $products = Products::all();
        
        return view ('products.index')->with('products', $products);
    }
    
    public function create()
    {
        return view('products.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        Products::create($input);

        return redirect('products')->with('flash_message', 'Product Added!');  
    }
    
    public function show($id)
    {
        $product = Products::find($id);

        return view('products.show')->with('products', $product);
    }
    
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit')->with('products', $product);
    }
  
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $input = $request->all();
        $product->update($input);

        return redirect('products')->with('flash_message', 'Product Updated!');  
    }
  
    public function destroy($id)
    {
        $products = Products::withTrashed()->find($id);

        if($products->trashed())
        {
            $products->forceDelete();
            return back()->with('flash_message', 'Product deleted permanently!'); 
        }

        Products::destroy($id);
        return redirect('products')->with('flash_message', 'Product deleted!');  
    }


    public function restore($id)
    {

    $product = Products::withTrashed()->find($id);
    $product->restore();

    return redirect('products')->with('flash_message', 'Product restored!');

    }
    

}
