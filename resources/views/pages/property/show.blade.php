@extends('layouts.master')
@section('title', 'Show Property')

@section('page')
<a class="btn btn-success mb-3" href="{{ route('propertys.index') }}">← Back to List</a>

<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4">
            @if($property->photo)
                <img src="{{ asset('img/properties/' . $property->photo) }}" class="img-fluid rounded-start" alt="Property Photo">
            @else
                <div class="text-center p-4">No Image Available</div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $property->title }}</h2>
                <p class="card-text"><strong>Description:</strong> {{ $property->description }}</p>
                <p class="card-text"><strong>Sqft:</strong> {{ $property->sqft }}</p>
                <p class="card-text"><strong>Bed Room:</strong> {{ $property->bed_room }}</p>
                <p class="card-text"><strong>Bath Room:</strong> {{ $property->bath_room }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $property->category->name ?? 'N/A' }}</p>
                <p class="card-text"><strong>Project:</strong> {{ $property->project->name ?? 'N/A' }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                <p class="card-text"><strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $property->location }}</p>
                <p class="card-text"><strong>Created At:</strong> {{ $property->created_at->format('d M Y, h:i A') }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $property->updated_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
