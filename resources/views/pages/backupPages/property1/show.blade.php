@extends('layouts.master')
@section('title', 'Show Property')

@section('style')
<style>
    .property-img {
        max-width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('page')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Property Details</h2>
        <a class="btn btn-outline-success" href="{{ route('propertys.index') }}">← Manage Properties</a>
    </div>

    <div class="row">
        <div class="col-md-6">
          
            @if (!empty($gallery))
                @foreach ($gallery as $img)
                    <img src="{{ url('img/' . $img) }}" class="property-img w-100 mb-2 shadow" alt="Property Image">
                @endforeach
            @else
                <div class="text-muted">No images available.</div>
            @endif
        </div>

        <div class="col-md-6">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $property->id }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>${{ number_format($property->price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $property->address }}</td>
                    </tr>
                    <tr>
                        <th>Beds</th>
                        <td>{{ $property->beds }}</td>
                    </tr>
                    <tr>
                        <th>Baths</th>
                        <td>{{ $property->baths }}</td>
                    </tr>
                    <tr>
                        <th>Square Feet</th>
                        <td>{{ $property->sqft }} sqft</td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>{{ $property->details }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('script')
<!-- Add JavaScript if needed -->
@endsection
