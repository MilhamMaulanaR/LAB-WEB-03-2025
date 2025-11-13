@extends('layouts.app')
@section('title','Edit Product')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-pencil"></i> Edit Product</h1>
  <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form method="post" action="{{ route('products.update',$product) }}" class="row g-3">
      @csrf @method('PUT')

      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name',$product->name) }}" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price',$product->price) }}" class="form-control" required>
      </div>
      <div class="col-md-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select">
          <option value="">—</option>
          @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id',$product->category_id)==$c->id)>{{ $c->name }}</option>
          @endforeach
        </select>
      </div>

      <hr class="mt-2">

      @php($d = $product->detail)
      <div class="col-12">
        <h5 class="mb-0"><i class="bi bi-card-text"></i> Product Detail</h5>
      </div>

      <div class="col-md-4">
        <label class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" name="weight" value="{{ old('weight',$d->weight ?? '') }}" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Size</label>
        <input name="size" value="{{ old('size',$d->size ?? '') }}" class="form-control">
      </div>
      <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description',$d->description ?? '') }}</textarea>
      </div>

      <div class="col-12">
        <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Update</button>
      </div>
    </form>
  </div>
</div>
@endsection
