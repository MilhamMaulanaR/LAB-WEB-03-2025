<?php

namespace App\Http\Controllers;

use App\Models\Category; // <-- 1. Import model
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Tampilkan list kategori (Halaman Index)
     */
    public function index()
    {
        // 2. Ambil semua data kategori, urutkan dari yang terbaru
        $categories = Category::latest()->get();

        // 3. Kirim data ke view 'categories.index'
        return view('categories.index', compact('categories'));
    }

    /**
     * Tampilkan form untuk membuat kategori baru (Halaman Create)
     */
    public function create()
    {
        // 4. Cukup tampilkan view-nya
        return view('categories.create');
    }

    /**
     * Simpan data kategori baru ke database (Proses dari form Create)
     */
    public function store(Request $request)
    {
        // 5. Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 6. Buat kategori baru
        Category::create($request->all());

        // 7. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu kategori (Halaman Show)
     */
    public function show(Category $category)
    {
        // 8. Laravel otomatis mencari kategori berdasarkan ID ($category)
        // Ini disebut "Route Model Binding"
        return view('categories.show', compact('category'));
    }

    /**
     * Tampilkan form untuk mengedit kategori (Halaman Edit)
     */
    public function edit(Category $category)
    {
        // 9. Sama seperti show(), kirim data kategori ke view 'categories.edit'
        return view('categories.edit', compact('category'));
    }

    /**
     * Update data kategori di database (Proses dari form Edit)
     */
    public function update(Request $request, Category $category)
    {
        // 10. Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 11. Update data kategori
        $category->update($request->all());

        // 12. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Hapus data kategori dari database (Proses Delete)
     */
    public function destroy(Category $category)
    {
        // 13. Hapus data
        $category->delete();

        // 14. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}