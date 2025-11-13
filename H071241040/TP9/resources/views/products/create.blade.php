@extends('layouts.app')
@section('title','New Product')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-plus-lg"></i> New Product</h1>
  <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form method="post" action="{{ route('products.store') }}" class="row g-3">
      @csrf

      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Category <span class="hint">(opsional)</span></label>
        <select name="category_id" class="form-select">
          <option value="">—</option>
          @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
          @endforeach
        </select>
      </div>

      <hr class="mt-2">

      <div class="col-12">
        <h5 class="mb-0"><i class="bi bi-card-text"></i> Product Detail</h5>
        <small class="text-muted">Wajib mengisi weight, lainnya opsional.</small>
      </div>

      <div class="col-md-4">
        <label class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" name="weight" value="{{ old('weight') }}" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Size</label>
        <input name="size" value="{{ old('size') }}" class="form-control">
      </div>
      <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
      </div>

      <div class="col-12">
        <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
