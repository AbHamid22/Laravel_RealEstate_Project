@extends('layouts.master')
@section('page')
<a class='btn btn-success mb-3' href="{{ route('propertys.index') }}">← Back to List</a>

<form action="{{ route('propertys.update', $property) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Price ($)</label>
        <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $property->price) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $property->address) }}" required>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Beds</label>
            <input type="number" name="beds" class="form-control" value="{{ old('beds', $property->beds) }}" required>
        </div>
        <div class="col">
            <label class="form-label">Baths</label>
            <input type="number" name="baths" class="form-control" value="{{ old('baths', $property->baths) }}" required>
        </div>
        <div class="col">
            <label class="form-label">Sqft</label>
            <input type="number" name="sqft" class="form-control" value="{{ old('sqft', $property->sqft) }}" required>
        </div>
        <div class="col">
            <label class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year', $property->year) }}" required min="1900" max="{{ date('Y') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Details</label>
        <textarea name="details" class="form-control" rows="4" required>{{ old('details', $property->details) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gallery (comma-separated URLs)</label>
        @php
            $galleryArray = is_array($property->gallery) ? $property->gallery : json_decode($property->gallery, true);
            $galleryString = is_array($galleryArray) ? implode(', ', $galleryArray) : '';
        @endphp
        <textarea name="gallery_input" class="form-control">{{ old('gallery_input', $galleryString) }}</textarea>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label">Latitude</label>
            <input type="text" name="lat" class="form-control" value="{{ old('lat', $property->lat) }}" required>
        </div>
        <div class="col">
            <label class="form-label">Longitude</label>
            <input type="text" name="lon" class="form-control" value="{{ old('lon', $property->lon) }}" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
