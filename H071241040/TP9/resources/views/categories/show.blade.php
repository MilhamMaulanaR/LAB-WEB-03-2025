@extends('layouts.app')
@section('title',$category->name)

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-tag"></i> Category Detail</h1>
  <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="row g-3">
  <div class="col-lg-5">
    <div class="card shadow-soft h-100">
      <div class="card-body">
        <h5 class="card-title mb-3">{{ $category->name }}</h5>
        <p class="mb-0 text-muted">{{ $category->description ?: '—' }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="card shadow-soft h-100">
      <div class="card-header bg-body-tertiary">
        <strong><i class="bi bi-bag"></i> Products</strong>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-hover mb-0">
            <thead class="table-light"><tr><th>Name</th><th class="text-end">Price</th></tr></thead>
            <tbody>
              @forelse($category->products as $p)
                <tr>
                  <td><a href="{{ route('products.show',$p) }}" class="text-decoration-none">{{ $p->name }}</a></td>
                  <td class="text-end">{{ number_format($p->price,2) }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center py-3 text-muted">Belum ada produk.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
