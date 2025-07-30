@extends('layouts.master')
@section('title','Manage Invoice')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manage Invoices</h3>
        <a href="{{ route('invoices.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New Invoice
        </a>
    </div>

   
    <div class="row g-4">
        @foreach($invoices as $invoice)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-2">Invoice #{{ $invoice->id }}</h5>
                    <ul class="list-unstyled small text-muted mb-3">
                        <li><strong class="card-text text-dark mb-1">Customer:</strong> {{ $invoice->customer->name ?? 'N/A' }}</li>
                        <li><strong class="card-text text-dark mb-1">Total:</strong> TK {{ number_format($invoice->total_amount, 2) }}</li>
                        <li><strong class="card-text text-dark mb-1">Status:</strong>
                            <span class="badge bg-{{ $invoice->status == 'Paid' ? 'success' : 'warning' }}">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </li>
                        <li><strong class="card-text text-dark mb-1">Issue Date:</strong> {{ \Carbon\Carbon::parse($invoice->issue_date)->format('d M Y') }}</li>
                        <li><strong class="card-text text-dark mb-1">Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</li>
                    </ul>
                </div>
                <div class="card-footer bg-light border-0 d-flex justify-content-between">
                    <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm rounded-pill">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-success btn-sm rounded-pill">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this invoice?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center mt-2">
    {{ $invoices->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
