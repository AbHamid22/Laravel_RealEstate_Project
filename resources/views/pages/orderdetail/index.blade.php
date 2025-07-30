@extends('layouts.master')
@section('title','Manage OrderDetail')

@section('style')
<!-- Optional styles -->
@endsection

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manage Order Details</h3>
        <a href="{{ route('orderdetails.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New OrderDetail
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($orderdetails as $orderdetail)
        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title mb-2">Property: {{ $orderdetail->property->title ?? 'N/A' }}</h5>
                    <p class="card-text mb-1"><strong>Order ID:</strong> {{ $orderdetail->order_id }}</p>
                    <p class="card-text mb-1"><strong>Flat No:</strong> {{ $orderdetail->flat_no }}</p>
                    <p class="card-text mb-1"><strong>Amount:</strong> {{ $orderdetail->amount }}</p>
                    <p class="card-text text-muted">
                        <small>Created: {{ $orderdetail->created_at }}</small><br>
                        <small>Updated: {{ $orderdetail->updated_at }}</small>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('orderdetails.show', $orderdetail->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('orderdetails.edit', $orderdetail->id) }}" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('orderdetails.destroy', $orderdetail->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
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

<div class="d-flex justify-content-center mt-3">
    {{ $orderdetails->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional JS -->
@endsection
