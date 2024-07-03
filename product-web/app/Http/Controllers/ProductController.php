<?php

namespace App\Http\Controllers;

use App\Models\Clasification;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index_product() {
        $products = Product::all();
        $clasifications = Clasification::all();

        return view('product.index', compact('products', 'clasifications'));
    }

    public function create_product(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'clasification_id' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'clasification_id' => $request->clasification_id,
        ]);

        return Redirect::back();
    }

    public function edit_product(Product $product) {
        $clasifications = Clasification::all();

        return view('product.edit', compact('product', 'clasifications'));
    }

    public function update_product(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'clasification_id' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'clasification_id' => $request->clasification_id,
        ]);

        return Redirect::route('product.index');
    }

    public function delete_product(Product $product) {
        $product->delete();

        return Redirect::back();
    }
}
