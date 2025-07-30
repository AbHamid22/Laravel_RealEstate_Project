@extends('layouts.master')
@section('title','Manage MoneyReceiptDetail')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Money Receipt Details</h3>
        <a href="{{ route('moneyreceiptdetails.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New MoneyReceiptDetail
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($moneyreceiptdetails as $moneyreceiptdetail)
        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title">Detail #{{ $moneyreceiptdetail->id }}</h5>
                    <p class="mb-1"><strong>Receipt ID:</strong> {{ $moneyreceiptdetail->moneyReceipt->id ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Property:</strong> {{ $moneyreceiptdetail->property->title ?? 'N/A' }}</p>
                    <p class="mb-1"><strong>Amount:</strong> {{ $moneyreceiptdetail->amount }}</p>
                    <p class="mb-0"><strong>ProjectID:</strong> {{ $moneyreceiptdetail->project_id }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('moneyreceiptdetails.show', $moneyreceiptdetail->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('moneyreceiptdetails.edit', $moneyreceiptdetail->id) }}" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('moneyreceiptdetails.destroy', $moneyreceiptdetail->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
    {{ $moneyreceiptdetails->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

