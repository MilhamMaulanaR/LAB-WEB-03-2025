<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Tampilkan list produk (Halaman Index)
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Tampilkan form untuk membuat produk baru (Halaman Create)
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Simpan data produk baru ke database
     */
    public function store(Request $request)
    {
        // 5. Validasi semua input, termasuk dari ProductDetail
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:255',
        ]);

        // 6. Gunakan DB Transaction
        // Ini memastikan jika salah satu query (misal simpan detail) gagal,
        // maka query simpan produk juga akan dibatalkan (rollback).
        try {
            DB::transaction(function () use ($request) {
                // 7. Buat Produk
                $product = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                ]);

                // 8. Buat ProductDetail menggunakan relasi
                $product->productDetail()->create([
                    'description' => $request->description,
                    'weight' => $request->weight,
                    'size' => $request->size,
                ]);
            });

            return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika terjadi error, kembali ke form dengan pesan error
            return back()->with('error', 'Gagal menyimpan produk: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan detail satu produk
     */
    public function show(Product $product)
    {
        // 9. Load relasi 'category' dan 'productDetail'
        $product->load('category', 'productDetail');
        return view('products.show', compact('product'));
    }

    /**
     * Tampilkan form untuk mengedit produk
     */
    public function edit(Product $product)
    {
        // 10. Load detail produknya untuk di-isi di form
        $product->load('productDetail');
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update data produk di database
     */
    public function update(Request $request, Product $product)
    {
        // 11. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'weight' => 'required|numeric|min:0',
            'size' => 'nullable|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request, $product) {
                // 12. Update Produk
                $product->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                ]);

                // 13. Update atau Buat ProductDetail
                // (updateOrCreate aman jika detailnya belum ada)
                $product->productDetail()->updateOrCreate(
                    ['product_id' => $product->id], 
                    [
                        'description' => $request->description,
                        'weight' => $request->weight,
                        'size' => $request->size,
                    ],
                );
            });

            return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data produk dari database
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}