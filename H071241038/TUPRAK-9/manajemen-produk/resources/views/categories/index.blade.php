@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Daftar Kategori Produk</h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        + Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $index => $category)
                                    <tr>
                                        {{-- Nomor urut (menyesuaikan dengan paginasi) --}}
                                        <td>{{ $index + $categories->firstItem() }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description ?? 'Tidak ada deskripsi' }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $category->id)}}" class="btn btn-info btn-sm text-white">Show</a>
                                            <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" 
                                                    class="d-inline" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                    @csrf
                                                    @method('DELETE') {{-- Ini memberitahu Laravel untuk menggunakan metode DELETE --}}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Data kategori masih kosong.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection