@extends('layouts.master')
@section('title', 'Create Customer')

@section('style')
<style>
    .form-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #aaa;
    }
    .form-group-icon input {
        padding-left: 2.5rem;
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
        <h5 class="mb-0">Add New Customer</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                <input type="file" class="form-control" name="photo" id="photo" required>
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <i class="fa fa-user form-icon"></i>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <i class="fa fa-envelope form-icon"></i>
                <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" required>
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                <i class="fa fa-phone form-icon"></i>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="+8801XXXXXXXXX" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Customer Type <span class="text-danger">*</span></label>
                <select class="form-select" name="type" id="type" required>
                    <option value="">Select Type</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Customer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<!-- Optional JavaScript validation or enhancement here -->
@endsection
