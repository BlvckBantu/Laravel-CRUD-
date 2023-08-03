<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
    // Validate the data
    $data = $request->validate([
        'Name' => 'required',
        'Quantity' => 'required|numeric',
        'Price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        'Description' => 'nullable'
    ]);

    // Create a new product using the validated data
    $newProduct = Product::create([
        'Name' => $data['Name'],
        'Quantity' => $data['Quantity'],
        'Price' => $data['Price'],
        'Description' => $data['Description'],
    ]);

    // Redirect to the product index page after creating the product
    return redirect(route('product.index'));
}

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
}
    
    public function update(Product $product, Request $request){

        
        $data = $request->validate([
            'Name' => 'required',
            'Quantity' => 'required|numeric',
            'Price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'Description' => 'nullable'
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }
}