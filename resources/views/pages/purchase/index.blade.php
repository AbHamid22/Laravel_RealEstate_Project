@extends('layouts.master')
@section('title','Manage Purchase')

@section('style')
<style>
    body {
        background-color: #f8f9fa;
     
    }

    .container {
        max-width: 1100px;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
        border: none;
        overflow: hidden;
        transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 12px 40px rgba(0, 123, 255, 0.3);
    }

    .card-header {
        background: #007bff;
        color: white;
        font-weight: 600;
        font-size: 1.3rem;
        padding: 1rem 1.5rem;
        border-bottom: none;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-success {
        font-weight: 600;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        box-shadow: 0 3px 8px rgba(0, 123, 255, 0.5);
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #0056b3;
        box-shadow: 0 6px 15px rgba(0, 86, 179, 0.7);
    }

    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
        border-radius: 0 0 12px 12px;
    }

    table.table {
        border-collapse: separate;
        border-spacing: 0 8px;
        background: white;
    }

    thead.table-dark th {
        background-color: #343a40;
        border: none;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    tbody tr {
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        transition: background-color 0.2s ease;
    }

    tbody tr:hover {
        background-color: #f1f5ff;
    }

    tbody td,
    thead th {
        vertical-align: middle !important;
        border: none !important;
        padding: 0.8rem 1rem;
    }

    tbody td strong.text-primary {
        font-size: 1.05rem;
    }

    tbody td span.text-success {
        font-weight: 600;
        color: #28a745;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.4em 0.7em;
        border-radius: 30px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .bg-warning {
        background-color: #ffc107 !important;
        color: #212529 !important;
    }

    .bg-success {
        background-color: #28a745 !important;
        color: white !important;
    }

    .bg-secondary {
        background-color: #6c757d !important;
        color: white !important;
    }


    .btn-sm {
        padding: 0.35rem 0.6rem;
        font-size: 0.85rem;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .btn-outline-info:hover {
        background-color: #17a2b8;
        color: white;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
</style>
@endsection

@section('page')

<div class="container my-5">
    <div class="card shadow-sm">
        <h1 class="mb-0">Purchase List</h1>
        <div class="card-header">
            <a href="{{ route('purchases.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> New
            </a>
        </div>
        <div class="container my-0">
            <form method="GET" action="{{ route('purchases.index') }}" class="d-flex mb-3" role="search">
                <input
                    class="form-control me-2"
                    type="search"
                    name="search"
                    placeholder="Search by Purchase ID,Vendor,Warhouse or Status"
                    value="{{ request('search') }}"
                    aria-label="Search" />
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0 text-nowrap">
                <thead class="table-info">
                    <tr>
                        <th>ID</th>
                        <th>Vendor</th>
                        <th>Warehouse</th>
                        <th>Purchase Date</th>
                        <th>Delivery Date</th>
                        <th>Purchase Total</th>
                        <th>Paid Amount</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->vendor->name }}</td>
                        <td>{{ $purchase->warehouse->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($purchase->delivery_date)->format('d M, Y') }}</td>
                        <td><strong class="text-primary">{{ number_format($purchase->purchase_total, 2) }} BDT</strong></td>
                        <td><span class="text-success"> {{ number_format($purchase->paid_amount, 2) }} BDT</span></td>
                        <td class="text-center">
                            <span class="badge 
                                {{ $purchase->status->name == 'Processing' ? 'bg-warning' : 
                                   ($purchase->status->name == 'Completed' ? 'bg-success' : 'bg-secondary') }}">
                                {{ $purchase->status->name }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-4 flex-wrap">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('purchases.show', $purchase->id) }}" title="View">
                                    <i class="fas fa-eye">Show</i>
                                </a>
                                <a class="btn btn-sm btn-outline-success" href="{{ route('purchases.edit', $purchase->id) }}" title="Edit">
                                    <i class="fas fa-edit">Edit</i>
                                </a>
                                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this purchase?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash-alt">Delete</i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach

                    @if($purchases->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            No purchases found.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    <!-- {{ $purchases->links('vendor.pagination.bootstrap-4') }} -->
    {{ $purchases->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection