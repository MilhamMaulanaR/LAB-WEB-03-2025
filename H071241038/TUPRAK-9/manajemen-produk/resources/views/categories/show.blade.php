@extends('layouts.app')

@section('title', 'Detail Kategori: ' . $category->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4">Detail Kategori: {{ $category->name }}</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-tag-fill me-2"></i> Informasi Kategori
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30%;">Nama Kategori</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $category->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Produk</th>
                            <td>
                                <span class="badge bg-success">{{ $category->products->count() }} Produk</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-box-seam-fill me-2"></i> Daftar Produk dalam Kategori Ini
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category->products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-info">Lihat Produk</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Tidak ada produk yang terdaftar di kategori ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">
                &larr; Kembali ke Daftar Kategori
            </a>
        </div>
    </div>
</div>
@endsection