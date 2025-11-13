@extends('layouts.app')
@section('title','Stocks')

@section('content')
<div class="page-header mb-3">
  <h1 class="h3 mb-0"><i class="bi bi-clipboard-data"></i> Stock Summary</h1>
  <div class="d-flex gap-2">
    <a href="{{ route('stocks.transfer.create') }}" class="btn btn-primary">
      <i class="bi bi-arrow-left-right"></i> Transfer Stock
    </a>
  </div>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form class="row gy-2 gx-2 align-items-end" method="get" action="{{ route('stocks.index') }}">
      <div class="col-sm-4">
        <label class="form-label">Filter Warehouse</label>
        <select name="warehouse_id" class="form-select" onchange="this.form.submit()">
          <option value="">All Warehouses</option>
          @foreach($warehouses as $w)
            <option value="{{ $w->id }}" @selected($warehouseId==$w->id)>{{ $w->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-auto">
        <a href="{{ route('stocks.index') }}" class="btn btn-outline-secondary">Reset</a>
      </div>
    </form>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Product</th>
            <th>Category</th>
            <th class="text-end" style="width:12%">Total Qty</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $p)
            <tr>
              <td><a href="{{ route('products.show',$p) }}" class="text-decoration-none fw-semibold">{{ $p->name }}</a></td>
              <td><span class="badge text-bg-secondary-subtle border">{{ $p->category?->name ?? '—' }}</span></td>
              <td class="text-end fw-semibold">{{ $p->qty_total }}</td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center py-4 text-muted">Tidak ada data.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="card-footer">
      {{ $products->links() }}
    </div>
  @endif
</div>
@endsection
