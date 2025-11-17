@extends('layouts.app')

@section('title', 'Daftar Gudang')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Daftar Gudang</h5>
                    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">
                        + Tambah Gudang
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gudang</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($warehouses as $index => $warehouse)
                                    <tr>
                                        <td>{{ $index + $warehouses->firstItem() }}</td>
                                        <td>{{ $warehouse->name }}</td>
                                        <td>{{ $warehouse->location ?? 'Tidak ada lokasi' }}</td>
                                        <td>
                                            <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Data gudang masih kosong.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $warehouses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection