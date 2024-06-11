<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product', compact('products'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'penjualan' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function destroy($id) {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    public function show($id) {
        $product = Product::find($id);

        if ($product) {
            return view('product-detail', compact('product'));
        }

        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    public function edit($id) {
        $product = Product::find($id);
    
        if ($product) {
            return view('edit-product', compact('product'));
        }
    
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|integer',
            'penjualan' => 'required|integer',
        ]);
    
        $product = Product::find($id);
    
        if ($product) {
            $product->update($request->all());
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }
    
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }
}
