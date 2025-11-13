@extends('layouts.app')
@section('title','Edit Warehouse')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-pencil"></i> Edit Warehouse</h1>
  <a href="{{ route('warehouses.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form method="post" action="{{ route('warehouses.update',$warehouse) }}" class="row g-3">
      @csrf @method('PUT')
      <div class="col-12">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name',$warehouse->name) }}" required>
      </div>
      <div class="col-12">
        <label class="form-label">Location</label>
        <textarea name="location" class="form-control" rows="2">{{ old('location',$warehouse->location) }}</textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Update</button>
      </div>
    </form>
  </div>
</div>
@endsection
