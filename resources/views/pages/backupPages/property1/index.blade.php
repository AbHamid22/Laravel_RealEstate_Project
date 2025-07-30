@extends('layouts.master')
@section('title','Manage Property')

@section('style')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
    .img-thumbnail {
        max-height: 100px;
        object-fit: cover;
    }
    .action-buttons a, .action-buttons input {
        margin: 2px;
    }
</style>
@endsection

@section('page')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Property Management</h2>
        <a href="{{ route('propertys.create') }}" class="btn btn-outline-success">
            + New Property
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center align-middle">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Gallery</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Beds</th>
                    <th>Baths</th>
                    <th>Sqft</th>
                    <th>Year</th>
                    <th>Details</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propertys as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>
                      
                        @if (!empty($gallery))
                          <img src="{{ $gallery[0] }}" class="img-thumbnail rounded" width="80" />

                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>${{ number_format($property->price, 2) }}</td>
                    <td>{{ $property->address }}</td>
                    <td>{{ $property->beds }}</td>
                    <td>{{ $property->baths }}</td>
                    <td>{{ $property->sqft }} sqft</td>
                    <td>{{ $property->year }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($property->details, 50) }}</td>
                    <td>{{ $property->slug }}</td>
                    <td class="action-buttons">
                        <form action="{{ route('propertys.destroy', $property->id) }}" method="POST">
                            <a class="btn btn-sm btn-info" href="{{ route('propertys.show', $property->id) }}">View</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('propertys.edit', $property->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete this property?')" />
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-muted">No properties found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination (if using paginate()) --}}
    <div class="mt-3">
        {{ $propertys->links() }}
    </div>

</div>
@endsection

@section('script')
<!-- Add any JavaScript here if needed -->
@endsection
