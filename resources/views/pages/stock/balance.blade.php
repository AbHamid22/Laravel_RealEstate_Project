@extends('layouts.master')
@section('title','Manage Stock')

@section('style')
<style>
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
<h2 class="mt-5 mb-3">Product-wise Stock Summary</h2>
<div class="row">
    @foreach($summary as $item)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h3 class="card-title text-success">{{ $item->product }}</h3>
                <p class="card-text text-dark mb-1"><strong>Product ID:</strong> {{ $item->id }}</p>
                <p class="card-text text-dark  mb-0"><strong>Total Available:</strong>
                    <span class="badge bg-warning text-dark">{{ $item->total }}</span>
                </p>
                <p class="card-text text-dark  mb-0"><strong>UoM:</strong>
                    <span class="badge bg-info text-white">{{ $item->uom }}</span>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('script')
@endsection