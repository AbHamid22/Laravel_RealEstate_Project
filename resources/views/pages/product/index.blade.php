@extends('layouts.master')
@section('title','Manage Product')

@section('style')
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1100px;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 12px 40px rgba(0, 123, 255, 0.3);
    }

    .card-header {
        background: #007bff;
        color: #fff;
        font-weight: 600;
        font-size: 1.3rem;
        padding: 1rem 1.5rem;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-primary, .btn-success, .btn-danger {
        border-radius: 50px;
        padding: 0.4rem 1rem;
        font-weight: 600;
        box-shadow: 0 3px 8px rgba(0, 123, 255, 0.4);
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #004085;
        box-shadow: 0 6px 15px rgba(0, 64, 133, 0.6);
    }
    .btn-success:hover {
        background-color: #155724;
        box-shadow: 0 6px 15px rgba(21, 87, 36, 0.6);
    }
    .btn-danger:hover {
        background-color: #721c24;
        box-shadow: 0 6px 15px rgba(114, 28, 36, 0.6);
    }

    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
        border-radius: 0 0 12px 12px;
        background: white;
    }

    table.table {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
    }

    thead th {
        background-color: #343a40;
        color: white;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.05em;
        border: none;
        padding: 0.9rem 1rem;
    }

    tbody tr {
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        border-radius: 8px;
        transition: background-color 0.2s ease;
    }
    tbody tr:hover {
        background-color: #e9f0ff;
    }

    tbody td {
        vertical-align: middle !important;
        border: none !important;
        padding: 0.7rem 1rem;
    }

    /* Product image styling */
    td img.product-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
    }
    td img.product-thumb:hover {
        transform: scale(1.1);
    }

    .pagination {
        justify-content: center;
    }
</style>
@endsection

@section('page')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h1 class="mb-0">Product List</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> New
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover text-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>UOM</th>
                        <!-- <th>Qty</th> -->
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->photo && file_exists(public_path('img/products/' . $product->photo)))
                                <img src="{{ asset('img/products/'.$product->photo) }}" alt="{{ $product->name }}" class="product-thumb" />
                            @else
                                <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image" class="product-thumb" />
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>Tk:{{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->discount}}%</td>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                        <td>{{ $product->type->name ?? 'N/A' }}</td>
                        <!-- <td>{{ $product->uom->name ?? 'N/A' }}</td> -->

                        <td>{{ $product->uom }}</td>
                        <td class="text-center">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                <a class="btn btn-primary btn-sm" href="{{ route('products.show', $product->id) }}" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-sm" href="{{ route('products.edit', $product->id) }}" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($products->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">No products found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    {{ $products->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- FontAwesome icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
