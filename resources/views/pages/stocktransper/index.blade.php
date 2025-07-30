@extends('layouts.master')
@section('title','Manage Stock Transfers')

@section('style')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">



@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Manage Stock Transfers</h4>
        <a href="{{ route('stocktranspers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New Transfer
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Project</th>
                            <th>Warehouse</th>
                            <th>Transfer Date</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stocktranspers as $stocktransper)
                        <tr>
                            <td>{{ $stocktransper->id }}</td>
                            <td>{{ $stocktransper->project->name ?? 'N/A' }}</td>
                            <td>{{ $stocktransper->warehouse->name ?? 'N/A' }}</td>
                            <td>{{ $stocktransper->transper_date }}</td>
                            <td>{{ $stocktransper->created_at }}</td>
                            <td>{{ $stocktransper->updated_at }}</td>
                            <td class="text-center">
                                <form action="{{ route('stocktranspers.destroy', $stocktransper->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                    <a href="{{ route('stocktranspers.show', $stocktransper->id) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('stocktranspers.edit', $stocktransper->id) }}" class="btn btn-sm btn-outline-success" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No stock transfers found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($stocktranspers instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="d-flex justify-content-center mt-3">
                {{ $stocktranspers->links('vendor.pagination.bootstrap-4') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $stocktranspers->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
