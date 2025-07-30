@extends('layouts.master')
@section('page')
<a class='btn btn-success mb-3' href="{{ route('propertys.index') }}">← Back to List</a>

<form action="{{ route('propertys.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Price ($)</label>
        <input type="number" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Beds</label>
            <input type="number" name="beds" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Baths</label>
            <input type="number" name="baths" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Sqft</label>
            <input type="number" name="sqft" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Year</label>
            <input type="number" name="year" class="form-control" required min="1900" max="{{ date('Y') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Details</label>
        <textarea name="details" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gallery (comma-separated URLs)</label>
        <textarea name="gallery_input" class="form-control" placeholder="https://example.com/image1.jpg, https://example.com/image2.jpg"></textarea>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Latitude</label>
            <input type="text" name="lat" class="form-control" required>
        </div>
        <div class="col">
            <label class="form-label">Longitude</label>
            <input type="text" name="lon" class="form-control" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection
