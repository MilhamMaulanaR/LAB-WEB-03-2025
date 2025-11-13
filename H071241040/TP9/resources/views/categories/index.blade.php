@extends('layouts.app')
@section('title','Categories')

@section('content')
<div class="page-header mb-3">
  <h1 class="h3 mb-0"><i class="bi bi-tags"></i> Categories</h1>
  <a href="{{ route('categories.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg"></i> New Category
  </a>
</div>

<div class="card shadow-soft">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:30%">Name</th>
            <th>Description</th>
            <th style="width:160px" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
        @forelse($categories as $c)
          <tr>
            <td>
              <a class="fw-semibold text-decoration-none" href="{{ route('categories.show',$c) }}">
                {{ $c->name }}
              </a>
            </td>
            <td>{{ $c->description ?: '—' }}</td>
            <td class="text-end">
              <a href="{{ route('categories.edit',$c) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-pencil"></i>
              </a>
              <form action="{{ route('categories.destroy',$c) }}" method="post" class="d-inline"
                    onsubmit="return confirm('Hapus kategori ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="text-center py-4 text-muted">Belum ada data.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($categories instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="card-footer">
      {{ $categories->links() }}
    </div>
  @endif
</div>
@endsection
