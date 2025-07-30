@extends('layouts.master')
@section('title', 'Manage Order')

@section('style')
<style>
    .table td,
    .table th {
        vertical-align: middle;
    }

    .btn-sm i {
        margin-right: 2px;
    }
</style>
@endsection

@section('page')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Orders</h4>
        <a href="{{ route('orders.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> New Order
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-nowrap">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Order Date</th>
                            <th>Handover Date</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name ?? 'N/A' }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->handover_date }}</td>
                            <td><strong class="text-primary">{{ number_format($order->total_amount, 2) }}</strong></td>
                            <td><span class="text-success">{{ number_format($order->paid_amount, 2) }}</span></td>
                            <td><span class="badge bg-info">{{ $order->discount ?? '0' }}</span></td>
                            <td>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('orders.show', $order->id) }}" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('orders.edit', $order->id) }}" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this order?')">
                                        <i class="fas fa-trash-alt"></i>
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
</div>
<div class="d-flex justify-content-center mt-0">
    {{ $orders->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection