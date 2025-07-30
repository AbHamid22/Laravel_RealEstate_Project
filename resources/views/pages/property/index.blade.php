<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@extends('layouts.master')
@section('title','Manage Property')
@section('style')
<style>
    .pagination {
        justify-content: center;
    }

    .pagination .page-item.active .page-link {
        background-color: rgb(6, 9, 12);
        border-color: rgb(6, 10, 14);
    }

    .pagination .page-link {
        color: rgb(7, 12, 17);
        margin: 0 5px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination .page-link:hover {
        color: rgb(15, 19, 24);
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    /* Hide the previous/next arrows */
    .page-item:first-child,
    .page-item:last-child {
        display: none;
    }
</style>
@endsection

@section('page')
<!-- <a href="{{ route('propertys.create') }}" class="btn btn-primary mb-3"> +New Property</a> -->
 <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">All Property List</h1>
    </div>
<form action="{{ route('propertys.index') }}" method="GET" class="mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-md-8">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control rounded-start"
                    placeholder="Search by title, location, or category..."
                    value="{{ request('search') }}">
                <button class="btn btn-dark rounded-end" type="submit">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('propertys.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i>Add Property
            </a>
        </div>
    </div>
</form>



<!-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($propertys as $property)
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('img/'.$property->photo) }}" class="card-img-top" alt="Property Image" style="height:200px; object-fit:cover;">
            <div class="card-body">
                <h2 class="card-title">{{ $property->title }}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>SQFT:</strong> {{ $property->sqft }}</li>
                    <li class="list-group-item"><strong>Bed_Room:</strong> {{ $property->bed_room }}</li>
                    <li class="list-group-item"><strong>Bath_Room:</strong> {{ $property->bath_room }}</li>
                    <li class="list-group-item"><strong>Price:</strong> {{ number_format($property->price) }}</li>

                    <li class="list-group-item"><strong>Location:</strong> {{ $property->location }}</li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a class="btn btn-sm btn-primary" href="{{ route('propertys.show', $property->id) }}" title="View">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-success" href="{{ route('propertys.edit', $property->id) }}" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('propertys.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div> -->

@if($propertys->count() > 0)
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($propertys as $property)
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('img/properties/'.$property->photo) }}" class="card-img-top" alt="Property Image" style="height:200px; object-fit:cover;">
            <div class="card-body">
                <h2 class="card-title">{{ $property->title }}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>SQFT:</strong> {{ $property->sqft }}</li>
                    <li class="list-group-item"><strong>Bed_Room:</strong> {{ $property->bed_room }}</li>
                    <li class="list-group-item"><strong>Bath_Room:</strong> {{ $property->bath_room }}</li>
                    <li class="list-group-item"><strong>Price:</strong> {{ $property->price }}</li>
                    <li class="list-group-item"><strong>Location:</strong> {{ $property->location }}</li>
                </ul>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a class="btn btn-sm btn-primary" href="{{ route('propertys.show', $property->id) }}" title="View">
                    <i class="fas fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-success" href="{{ route('propertys.edit', $property->id) }}" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('propertys.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<div class="alert alert-warning text-center mt-4" role="alert">
    No properties found matching your search.
</div>
@endif


<div class="d-flex justify-content-center mt-3">
    {{ $propertys->links('vendor.pagination.bootstrap-4') }}
</div>

@endsection

@section('script')
@endsection