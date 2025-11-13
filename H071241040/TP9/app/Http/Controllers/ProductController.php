<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create() {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request) {
        DB::transaction(function() use ($request) {
            $data = $request->validated();
            $detail = [
                'description' => $data['description'] ?? null,
                'weight' => $data['weight'],
                'size' => $data['size'] ?? null,
            ];
            unset($data['description'],$data['weight'],$data['size']);

            $product = Product::create($data);
            $product->detail()->create($detail);
        });

        return redirect()->route('products.index')->with('ok','Product created');
    }

    public function show(Product $product) {
        $product->load(['category','detail','warehouses']);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) {
        $product->load('detail');
        $categories = Category::orderBy('name')->get();
        return view('products.edit', compact('product','categories'));
    }

    public function update(ProductRequest $request, Product $product) {
        DB::transaction(function() use ($request, $product) {
            $data = $request->validated();
            $detailData = [
                'description' => $data['description'] ?? null,
                'weight' => $data['weight'],
                'size' => $data['size'] ?? null,
            ];
            unset($data['description'],$data['weight'],$data['size']);

            $product->update($data);
            $product->detail()->updateOrCreate(['product_id'=>$product->id], $detailData);
        });

        return redirect()->route('products.index')->with('ok','Product updated');
    }

    public function destroy(Product $product) {
        $product->delete();
        return back()->with('ok','Product deleted');
    }
}
