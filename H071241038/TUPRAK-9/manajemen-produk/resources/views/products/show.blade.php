@extends('layouts.app')

@section('title', 'Detail Produk: ' . $product->name)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4">{{ $product->name }}</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-info-circle me-2"></i> Informasi Dasar
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30%;">Kategori</th>
                            <td>{{ $product->category->name ?? 'Tanpa Kategori' }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Berat</th>
                            <td>{{ number_format($product->productDetail->weight ?? 0, 2, ',', '.') }} kg</td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td>{{ $product->productDetail->size ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $product->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diupdate Pada</th>
                            <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <i class="bi bi-file-text me-2"></i> Deskripsi Lengkap
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $product->productDetail->description ?? 'Tidak ada deskripsi lengkap.' }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-boxes me-2"></i> Lokasi Stok Saat Ini
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Gudang</th>
                                    <th>Kuantitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product->warehouses as $warehouse)
                                    <tr>
                                        <td>{{ $warehouse->name }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $warehouse->pivot->quantity }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            Stok produk ini belum tercatat di gudang mana pun.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-end">Total Stok Global:</th>
                                    <th>
                                        {{-- Hitung total stok dari semua gudang --}}
                                        <span class="badge bg-danger">
                                            {{ $product->warehouses->sum('pivot.quantity') }}
                                        </span>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
                &larr; Kembali ke Daftar Produk
            </a>
        </div>
    </div>
</div>
@endsection