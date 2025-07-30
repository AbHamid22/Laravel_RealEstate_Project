@extends('layouts.master')
@section('title', 'Issue Product to Project')

@section('page')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Issue Product to Project</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('stock.issue.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="project_id" class="form-label">Project</label>
                    <select name="project_id" id="project_id" class="form-control" required>
                        <option value="">Select Project</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_id" class="form-label">Product</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="uom_id" class="form-label">Unit</label>
                    <select name="uom_id" id="uom_id" class="form-control" required>
                        <option value="">Select Unit</option>
                        @foreach($uoms as $uom)
                            <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="warehouse_id" class="form-label">Warehouse</label>
                    <select name="warehouse_id" id="warehouse_id" class="form-control" required>
                        <option value="">Select Warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="remark" class="form-label">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Issue Product</button>
                <a href="{{ route('stock.issue.manage') }}" class="btn btn-outline-info ms-2">View Issued Products</a>
            </form>
        </div>
    </div>
</div>
@endsection 