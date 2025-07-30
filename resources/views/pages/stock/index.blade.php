@extends('layouts.master')
@section('title','Manage Stock')

@section('style')
<style>
    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 13px;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .card-text {
        color: #555;
    }
</style>
@endsection

@section('page')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Stock Records</h4>
    <a class="btn btn-primary" href="{{ route('stocks.create') }}">
        <i class="fa fa-plus"></i> New Stock
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>Product</th>
                        <th>UOM</th>
                        <th>Quantity</th>
                        <th>Transaction</th>
                        <th>Warehouse</th>
                        <th>Remark</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $stock)
                    <tr>
                        <td>{{ $stock->id }}</td>
                        <td>{{ $stock->product->name ?? 'N/A' }}</td>
                        <td>{{ $stock->uom->name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $stock->qty }}</span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $stock->transactionType->name ?? 'N/A' }}</span>
                        </td>
                        <td>{{ $stock->warehouse->name ?? 'N/A' }}</td>
                        <td>{{ $stock->remark }}</td>
                        <td class="text-center">
                            <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this stock record?');">
                                <a href="{{ route('stocks.show', $stock->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No stock records available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $stocks->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection


@section('script')
@endsection