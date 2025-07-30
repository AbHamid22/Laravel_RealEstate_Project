@extends('layouts.master')
@section('title', 'Edit Customer')

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
    .img-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
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
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Customer Information</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="photo" class="form-label">Current Photo</label><br>
                <img src="{{ asset('img/customers/' . $customer->photo) }}" class="img-preview mb-2" alt="Customer Photo">
                <input type="file" class="form-control" name="photo" id="photo">
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <i class="fa fa-user form-icon"></i>
                <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}" placeholder="Full Name" required>
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <i class="fa fa-envelope form-icon"></i>
                <input type="email" class="form-control" name="email" id="email" value="{{ $customer->email }}" placeholder="example@email.com" required>
            </div>

            <div class="mb-3 position-relative form-group-icon">
                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                <i class="fa fa-phone form-icon"></i>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $customer->phone }}" placeholder="+8801XXXXXXXXX" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Customer Type <span class="text-danger">*</span></label>
                <select class="form-select" name="type" id="type" required>
                    <option value="">Select Type</option>
                    <option value="buyer" {{ $customer->type == 'buyer' ? 'selected' : '' }}>buyer</option>
                    <option value="seller" {{ $customer->type == 'seller' ? 'selected' : '' }}>seller</option>
                    <!-- <option value="vip" {{ $customer->type == 'vip' ? 'selected' : '' }}>VIP</option> -->
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<!-- Optional JavaScript to preview image upload -->
<script>
    document.getElementById("photo").addEventListener("change", function(event) {
        const [file] = this.files;
        if (file) {
            const imgPreview = document.querySelector(".img-preview");
            imgPreview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection
