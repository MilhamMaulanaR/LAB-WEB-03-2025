<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use App\Models\Category; 
use App\Models\ProductDetail; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price, 
                'category_id' => $request->category_id,
            ]);

            $product->productDetail()->create([
                'description' => $request->description,
                'weight' => $request->weight,
                'size' => $request->size,
            ]);

            DB::commit();

            return redirect()->route('products.index')
                             ->with('success', 'Produk baru berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan saat menyimpan produk: ' . $e->getMessage())
                             ->withInput();
        }
    }

    public function show(Product $product)
    {
        $product = $product->load([
            'category', 
            'productDetail', 
            'warehouses'
        ]);
        
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,     
                'category_id' => $request->category_id,
            ]);

            $product->productDetail()->updateOrCreate(
                ['product_id' => $product->id],
                [ 
                    'description' => $request->description,
                    'weight' => $request->weight,
                    'size' => $request->size,
                ]
            );
            DB::commit();

            return redirect()->route('products.index')
                             ->with('success', 'Produk berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage())
                             ->withInput();
        }
    
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            
            return redirect()->route('products.index')
                             ->with('success', 'Produk berhasil dihapus.');
                             
        } catch (\Exception $e) {
            return redirect()->route('products.index')
                             ->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    
    }
}
