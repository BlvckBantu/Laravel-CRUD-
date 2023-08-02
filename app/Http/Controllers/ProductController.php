<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
{
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
}
