<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of the products.
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product.
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created product in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'categoryId' => 'required|exists:categories,id',
            'supplierId' => 'required|exists:suppliers,id',
        ]);

        Products::create($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    // Display the specified product.
    public function show(Products $product)
    {
        return view('products.show',compact('product'));
    }

    // Show the form for editing the specified product.
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'categoryId' => 'required|exists:categories,id',
            'supplierId' => 'required|exists:suppliers,id',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    // Remove the specified product from storage.
    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
