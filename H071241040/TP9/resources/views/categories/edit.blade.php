@extends('layouts.app')
@section('title','Edit Category')

@section('content')
<div class="page-header mb-3">
  <h1 class="h4 mb-0"><i class="bi bi-pencil"></i> Edit Category</h1>
  <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

<div class="card shadow-soft">
  <div class="card-body">
    <form method="post" action="{{ route('categories.update',$category) }}" class="row g-3">
      @csrf @method('PUT')
      <div class="col-12">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name',$category->name) }}" class="form-control" required>
      </div>
      <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description',$category->description) }}</textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary"><i class="bi bi-check2-circle"></i> Update</button>
      </div>
    </form>
  </div>
</div>
@endsection
