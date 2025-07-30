@extends('layouts.master')
@section('title','Manage MoneyReceipt')

@section('style')
<!-- You may include custom CSS here if needed -->
@endsection

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>MoneyReceipt History</h3>
        <a href="{{ route('moneyreceipts.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>Create New MR
        </a>
    </div>

    <div class="row g-4">
        @foreach($moneyreceipts as $moneyreceipt)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-2">Receipt #{{ $moneyreceipt->id }}</h5>
                    <ul class="list-unstyled small text-muted mb-3">
                        <li><strong class="text-dark">Customer:</strong> {{ $moneyreceipt->customer->name ?? 'N/A' }}</li>
                        <li><strong class="text-dark">Remark:</strong> {{ $moneyreceipt->remark ?? 'N/A' }}</li>
                        <li><strong class="text-dark">Total:</strong> TK {{ number_format($moneyreceipt->total_amount, 2) }}</li>
                        <li><strong class="text-dark">Discount:</strong> TK {{ number_format($moneyreceipt->moneyreceiptdetail->discount ?? 0, 2) }}</li>
                        <li><strong class="text-dark">VAT:</strong> TK {{ number_format($moneyreceipt->vat ?? 0, 2) }}</li>
                        <li>
                            <strong class="text-dark">Created:</strong>
                            {{ \Carbon\Carbon::parse($moneyreceipt->created_at)->format('d M Y, h:i A') }}
                        </li>
                    </ul>
                </div>
                <div class="card-footer bg-light border-0 d-flex justify-content-between">
                    <a href="{{ route('moneyreceipts.show', $moneyreceipt->id) }}" class="btn btn-info btn-sm rounded-pill" aria-label="View Receipt">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('moneyreceipts.edit', $moneyreceipt->id) }}" class="btn btn-success btn-sm rounded-pill" aria-label="Edit Receipt">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('moneyreceipts.destroy', $moneyreceipt->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill" aria-label="Delete Receipt">
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
    {{ $moneyreceipts->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional scripts -->
@endsection