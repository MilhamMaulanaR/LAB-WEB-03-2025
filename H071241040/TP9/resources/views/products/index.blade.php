@extends('layouts.app')
@section('title','Products')

@section('content')
<div class="page-header mb-3">
  <h1 class="h3 mb-0"><i class="bi bi-bag"></i> Products</h1>
  <a href="{{ route('products.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg"></i> New Product
  </a>
</div>

<div class="card shadow-soft">
  <div class="card-body p-3">
    <form class="row g-2 mb-2" method="get" action="{{ route('products.index') }}">
      <div class="col-sm-6 col-lg-4">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama produk…">
      </div>
      <div class="col-auto">
        <button class="btn btn-outline-secondary"><i class="bi bi-search"></i> Search</button>
        <a href="{{ route('products.index') }}" class="btn btn-outline-light border">Reset</a>
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th style="width:25%">Category</th>
            <th style="width:15%" class="text-end">Price</th>
            <th style="width:140px" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $p)
            <tr>
              <td><a class="fw-semibold text-decoration-none" href="{{ route('products.show',$p) }}">{{ $p->name }}</a></td>
              <td><span class="badge text-bg-secondary-subtle border">{{ $p->category?->name ?? '—' }}</span></td>
              <td class="text-end">{{ number_format($p->price,2) }}</td>
              <td class="text-end">
                <a href="{{ route('products.edit',$p) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('products.destroy',$p) }}" method="post" class="d-inline"
                      onsubmit="return confirm('Hapus produk ini?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="card-footer">
      {{ $products->appends(['q'=>request('q')])->links() }}
    </div>
  @endif
</div>
@endsection
