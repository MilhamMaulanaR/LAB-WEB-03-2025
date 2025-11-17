@extends('layouts.app')

@section('title', 'Manajemen Stok')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Transfer Stok</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('stocks.transfer') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Produk</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Gudang</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-select" required>
                                <option value="">-- Pilih Gudang --</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Kuantitas</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" 
                                   placeholder="Contoh: +10 atau -5" required>
                            <div class="form-text">
                                Masukkan nilai positif (misal: 10) untuk menambah stok,
                                atau nilai negatif (misal: -5) untuk mengurangi stok.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Proses Transfer</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Stok per Gudang</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('stocks.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <select name="warehouse_id" class="form-select">
                                <option value="">-- Tampilkan Semua Gudang --</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ $filterWarehouseId == $warehouse->id ? 'selected' : '' }}>
                                        {{ $warehouse->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Filter</button>
                            <a href="{{ route('stocks.index') }}" class="btn btn-outline-danger">Reset</a>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Nama Gudang</th>
                                    <th>Total Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stockEntries as $entry)
                                    <tr>
                                        <td>{{ $entry->product_name }}</td>
                                        <td>{{ $entry->warehouse_name }}</td>
                                        <td>{{ $entry->quantity }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            Tidak ada data stok.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $stockEntries->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection