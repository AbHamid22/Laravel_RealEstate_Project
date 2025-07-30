@extends('layouts.master')
@section('title','Show Stock')
@section('style')
<style>
    .stock-label {
        font-weight: 600;
        color: #555;
    }
    .stock-value {
        font-weight: 500;
        color: #000;
    }
</style>
@endsection

@section('page')
<div class="container-fluid px-0">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Stock Details</h4>
        <a class='btn btn-sm btn-success' href="{{ route('stocks.index') }}">
            <i class="fas fa-list me-1"></i> Manage Stocks
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Stock ID:</span>
                        <div class="stock-value">{{ $stock->id }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Product:</span>
                        <div class="stock-value">{{ $stock->product->name ?? 'N/A' }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Unit of Measurement:</span>
                        <div class="stock-value">{{ $stock->uom->name ?? 'N/A' }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Quantity:</span>
                        <div class="stock-value">{{ $stock->qty }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Transaction Type:</span>
                        <div class="stock-value">{{ $stock->transactionType->name ?? 'N/A' }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Warehouse:</span>
                        <div class="stock-value">{{ $stock->warehouse->name ?? 'N/A' }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Remark:</span>
                        <div class="stock-value">{{ $stock->remark ?? '-' }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Created At:</span>
                        <div class="stock-value">{{ $stock->created_at }}</div>
                    </div>

                    <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Updated At:</span>
                        <div class="stock-value">{{ $stock->updated_at }}</div>
                    </div>

                    {{-- Future: Add User Info --}}
                    {{-- <div class="border-bottom pb-2 mb-2">
                        <span class="stock-label">Entered By:</span>
                        <div class="stock-value">{{ $stock->user->name ?? 'System' }}</div>
                    </div> --}}
                </div>
            </div>

            <hr class="my-4">

            {{-- Stock Balance Summary --}}
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3">
                    <div class="card bg-light border-success">
                        <div class="card-body text-center">
                            <h5 class="fw-bold text-success">Current Stock Balance</h5>

                            {{-- Replace the below logic with your dynamic calculation --}}
                            @php
                                // Sample placeholder logic
                                $stockIn = \App\Models\Stock::where('product_id', $stock->product_id)
                                            ->whereHas('transactionType', fn($q) => $q->where('transaction_type_id', '3'))
                                            ->sum('qty');

                                $stockOut = \App\Models\Stock::where('product_id', $stock->product_id)
                                            ->whereHas('transactionType', fn($q) => $q->where('transaction_type_id', '1'))
                                            ->sum('qty');

                                $balance = $stockIn - $stockOut;
                            @endphp

                            <p class="fs-5 mb-1">Stock In: <strong>{{ $stockIn }}</strong></p>
                            <p class="fs-5 mb-1">Stock Out: <strong>{{ $stockOut }}</strong></p>
                            <p class="fs-5 mb-0 text-success">Available: <strong>{{ $balance }}</strong> {{ $stock->uom->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> 

</div>
@endsection
