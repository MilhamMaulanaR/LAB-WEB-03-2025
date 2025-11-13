@extends('layouts.app')
@section('title','New Warehouse')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-plus-lg"></i> New Warehouse</h1>
  <a href="{{ route('warehouses.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form method="post" action="{{ route('warehouses.store') }}" class="row g-3">
      @csrf
      <div class="col-12">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name') }}" required>
      </div>
      <div class="col-12">
        <label class="form-label">Location <span class="hint">(opsional)</span></label>
        <textarea name="location" class="form-control" rows="2">{{ old('location') }}</textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
