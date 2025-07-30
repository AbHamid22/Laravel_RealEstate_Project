@extends('layouts.master')
@section('title','Manage InvoiceDetail')

@section('style')
<!-- Optional custom styles -->
@endsection

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manage Invoice Details</h3>
        <a href="{{ route('invoicedetails.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New InvoiceDetail
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($invoicedetails as $invoicedetail)
        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title">Detail #{{ $invoicedetail->id }}</h5>
                    <p class="card-text mb-1"><strong>Invoice ID:</strong> {{ $invoicedetail->invoice_id }}</p>
                    <p class="card-text mb-1"><strong>Property ID:</strong> {{ $invoicedetail->property_id }}</p>
                    <p class="card-text mb-1"><strong>Total Amount:</strong> {{ $invoicedetail->total_amount }}</p>
                    <p class="card-text mb-1"><strong>Created:</strong> {{ $invoicedetail->created_at }}</p>
                    <p class="card-text"><strong>Updated:</strong> {{ $invoicedetail->updated_at }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('invoicedetails.show', $invoicedetail->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('invoicedetails.edit', $invoicedetail->id) }}" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('invoicedetails.destroy', $invoicedetail->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
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
    {{ $invoicedetails->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional JavaScript -->
@endsection
