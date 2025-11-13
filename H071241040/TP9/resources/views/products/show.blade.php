@extends('layouts.app')
@section('title',$product->name)

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-bag"></i> Product Detail</h1>
  <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="row g-3">
  <div class="col-lg-5">
    <div class="card shadow-soft h-100">
      <div class="card-body">
        <h5 class="card-title mb-1">{{ $product->name }}</h5>
        <div class="mb-2 text-muted">
          Category:
          <span class="badge text-bg-secondary-subtle border">{{ $product->category?->name ?? '—' }}</span>
        </div>
        <h4 class="fw-bold mb-3">Rp {{ number_format($product->price,2) }}</h4>

        @if($product->detail)
          <div class="border rounded p-3 bg-body-tertiary">
            <div class="row">
              <div class="col-6">
                <div class="small text-muted">Weight</div>
                <div class="fw-semibold">{{ $product->detail->weight }} kg</div>
              </div>
              <div class="col-6">
                <div class="small text-muted">Size</div>
                <div class="fw-semibold">{{ $product->detail->size ?: '—' }}</div>
              </div>
            </div>
            <div class="mt-2 small text-muted">Description</div>
            <div>{{ $product->detail->description ?: '—' }}</div>
          </div>
        @endif
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card shadow-soft h-100">
      <div class="card-header bg-body-tertiary">
        <strong><i class="bi bi-boxes"></i> Stocks per Warehouse</strong>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-sm table-hover mb-0">
            <thead class="table-light"><tr><th>Warehouse</th><th class="text-end">Qty</th></tr></thead>
            <tbody>
              @forelse($product->warehouses as $w)
                <tr>
                  <td>{{ $w->name }}</td>
                  <td class="text-end">{{ $w->pivot->quantity }}</td>
                </tr>
              @empty
                <tr><td colspan="2" class="text-center py-3 text-muted">Belum ada pencatatan stok.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer d-flex gap-2">
        <a href="{{ route('stocks.transfer.create') }}" class="btn btn-outline-primary">
          <i class="bi bi-arrow-left-right"></i> Transfer Stock
        </a>
        <a href="{{ route('products.edit',$product) }}" class="btn btn-outline-secondary">
          <i class="bi bi-pencil"></i> Edit
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
