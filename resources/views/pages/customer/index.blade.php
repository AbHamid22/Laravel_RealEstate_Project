@extends('layouts.master')
@section('title','Manage Customers')

@section('style')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
    .customer-photo {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
    }
</style>
@endsection

@section('page')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Customer List</h4>
    <a class="btn btn-primary" href="{{ route('customers.create') }}">
        <i class="fa fa-plus-circle"></i> New Customer
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Type</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <img src="{{ asset('img/customers/' . $customer->photo) }}" 
                                     class="customer-photo" alt="{{ $customer->name }}">
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <span class="badge bg-{{ $customer->type == 'corporate' ? 'info' : 'secondary' }}">
                                    {{ ucfirst($customer->type) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('customers.show', $customer->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('customers.edit', $customer->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                onclick="return confirm('Are you sure to delete this customer?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No customers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $customers->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional: Include any DataTables or interactive JS here -->
@endsection
