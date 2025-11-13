@extends('layouts.app')
@section('title','Transfer Stock')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-arrow-left-right"></i> Transfer Stock</h1>
  <a href="{{ route('stocks.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="row g-3">
  <div class="col-lg-7">
    <div class="card shadow-soft">
      <div class="card-body">
        <form method="post" action="{{ route('stocks.transfer.store') }}" class="row g-3">
          @csrf
          <div class="col-md-6">
            <label class="form-label">Warehouse</label>
            <select name="warehouse_id" class="form-select" required>
              @foreach($warehouses as $w)
                <option value="{{ $w->id }}">{{ $w->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Product</label>
            <select name="product_id" class="form-select" required>
              @foreach($products as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Delta <span class="hint">(gunakan nilai + untuk masuk, − untuk keluar)</span></label>
            <input type="number" name="delta" class="form-control" value="1" required>
          </div>
          <div class="col-12">
            <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Submit</button>
          </div>
        </form>
      </div>
      <div class="card-footer small text-muted">
        Aturan: stok tidak boleh menjadi negatif. Jika belum ada baris stok dan delta negatif, transaksi ditolak.
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card shadow-soft">
      <div class="card-header bg-body-tertiary">
        <strong><i class="bi bi-info-circle"></i> Tips</strong>
      </div>
      <div class="card-body small">
        <ul class="mb-0">
          <li>Gunakan nilai <strong>positif</strong> untuk menambah stok (barang masuk).</li>
          <li>Gunakan nilai <strong>negatif</strong> untuk mengurangi stok (barang keluar).</li>
          <li>Jika kombinasi <em>product–warehouse</em> belum ada dan Anda mengurangi stok, sistem akan menolak.</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
