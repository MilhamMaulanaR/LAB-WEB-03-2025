@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{-- Kita beri jarak sedikit di atas --}}
            <h3 class="mb-4 fw-light">Dashboard Ringkasan</h3>
        </div>
    </div>

    <div class="row">
        
        <div class="col-lg-4 col-md-6 mb-4">
            {{-- Tambahkan class 'dashboard-card' --}}
            <div class="card dashboard-card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <div>
                        <h5 class="card-title mb-0">TOTAL KATEGORI</h5>
                        <p class="card-text display-4 fw-bold">{{ $totalCategories }}</p>
                    </div>
                    {{-- Tambahkan ikon --}}
                    <i class="bi bi-tags-fill dashboard-card-icon"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="card-footer text-white text-decoration-none d-flex justify-content-between align-items-center">
                    <span>Lihat Detail</span>
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card dashboard-card text-white bg-success shadow-sm">
                <div class="card-body">
                    <div>
                        <h5 class="card-title mb-0">TOTAL GUDANG</h5>
                        <p class="card-text display-4 fw-bold">{{ $totalWarehouses }}</p>
                    </div>
                    <i class="bi bi-house-door-fill dashboard-card-icon"></i>
                </div>
                <a href="{{ route('warehouses.index') }}" class="card-footer text-white text-decoration-none d-flex justify-content-between align-items-center">
                    <span>Lihat Detail</span>
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card dashboard-card text-white bg-info shadow-sm">
                <div class="card-body">
                    <div>
                        <h5 class="card-title mb-0">TOTAL PRODUK</h5>
                        <p class="card-text display-4 fw-bold">{{ $totalProducts }}</p>
                    </div>
                    <i class="bi bi-box-seam-fill dashboard-card-icon"></i>
                </div>
                <a href="{{ route('products.index') }}" class="card-footer text-white text-decoration-none d-flex justify-content-between align-items-center">
                    <span>Lihat Detail</span>
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection