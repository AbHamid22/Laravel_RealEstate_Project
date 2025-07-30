@extends('layouts.master')
@section('title', 'Show Customer')

@section('style')
<style>
    .customer-photo-lg {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ccc;
    }
    .card-label {
        font-weight: bold;
        color: #6c757d;
    }
    .card-value {
        font-size: 1.1rem;
    }
</style>
@endsection

@section('page')
<div class="mb-3">
    <a class="btn btn-success" href="{{ route('customers.index') }}">
        <i class="fa fa-arrow-left"></i> Back to Customer List
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Customer Details</h5>
    </div>
    <div class="card-body">
        <div class="text-center mb-4">
            <img src="{{ asset('img/customers/' . $customer->photo) }}" alt="{{ $customer->name }}" class="customer-photo-lg">
            <h4 class="mt-2">{{ $customer->name }}</h4>
            <span class="badge bg-info text-dark text-capitalize px-3">{{ $customer->type }}</span>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <span class="card-label">Email:</span>
                <div class="card-value">{{ $customer->email }}</div>
            </div>
            <div class="col-md-6 mb-2">
                <span class="card-label">Phone:</span>
                <div class="card-value">{{ $customer->phone }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <span class="card-label">Customer ID:</span>
                <div class="card-value">{{ $customer->id }}</div>
            </div>
            <div class="col-md-6 mb-2">
                <span class="card-label">Created At:</span>
                <div class="card-value">{{ $customer->created_at->format('d M, Y h:i A') }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <span class="card-label">Last Updated:</span>
                <div class="card-value">{{ $customer->updated_at->format('d M, Y h:i A') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Optional JavaScript or extra interactions can go here -->
@endsection
