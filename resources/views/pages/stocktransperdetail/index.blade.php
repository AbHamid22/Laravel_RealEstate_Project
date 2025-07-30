@extends('layouts.master')
@section('title','Manage Stock Transfer Details')

@section('style')
<!-- Optional: Add any page-specific styles here -->
@endsection
<!-- Add this in <head> section of layouts/master.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@section('page')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Stock Transfer Details</h3>
        <a href="{{route('stocktransperdetails.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> New Detail
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-nowrap">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Transfer ID</th>
                        <th>Product</th>
                        <th>UoM</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Transaction Type</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocktransperdetails as $stocktransperdetail)
                    <tr>
                        <td>{{ $stocktransperdetail->id }}</td>
                        <td>{{ $stocktransperdetail->transper->id ?? 'N/A' }}</td>
                        <td>{{ $stocktransperdetail->product->name ?? 'N/A' }}</td>
                        <td>{{ $stocktransperdetail->uom->name ?? 'N/A' }}</td>
                        <td>{{ $stocktransperdetail->qty }}</td>
                        <td>{{ number_format($stocktransperdetail->price, 2) }}</td>
                        <td>{{ $stocktransperdetail->transactionType->name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <form action="{{ route('stocktransperdetails.destroy', $stocktransperdetail->id) }}" method="post" class="d-inline-block">
                                <a class="btn btn-sm btn-info" href="{{ route('stocktransperdetails.show', $stocktransperdetail->id) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-success" href="{{ route('stocktransperdetails.edit', $stocktransperdetail->id) }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $stocktransperdetails->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional: Add any custom scripts here -->
@endsection
