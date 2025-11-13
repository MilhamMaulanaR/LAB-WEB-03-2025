@extends('layouts.app')
@section('title','Warehouses')

@section('content')
<div class="page-header mb-3">
  <h1 class="h3 mb-0"><i class="bi bi-building"></i> Warehouses</h1>
  <a href="{{ route('warehouses.create') }}" class="btn btn-primary">
    <i class="bi bi-plus-lg"></i> New Warehouse
  </a>
</div>

<div class="card shadow-soft">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:30%">Name</th>
            <th>Location</th>
            <th class="text-end" style="width:140px">Action</th>
          </tr>
        </thead>
        <tbody>
        @forelse($warehouses as $w)
          <tr>
            <td class="fw-semibold">{{ $w->name }}</td>
            <td class="text-muted">{{ $w->location ?: '—' }}</td>
            <td class="text-end">
              <a href="{{ route('warehouses.edit',$w) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-pencil"></i>
              </a>
              <form action="{{ route('warehouses.destroy',$w) }}" method="post" class="d-inline"
                    onsubmit="return confirm('Hapus gudang ini?')">
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
  @if($warehouses instanceof \Illuminate\Pagination\AbstractPaginator)
    <div class="card-footer">
      {{ $warehouses->links() }}
    </div>
  @endif
</div>
@endsection
