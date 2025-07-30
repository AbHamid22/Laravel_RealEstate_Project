@extends('layouts.master')
@section('title','Manage People')

@section('style')
<style>
    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 13px;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .person-photo {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>
@endsection

@section('page')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">People Directory</h4>
    <a href="{{route('persons.create')}}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New Person
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover text-nowrap align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Photo</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($persons as $person)
                    <tr>
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->positon }}</td>
                        <td>
                            <img src="{{ asset('img/'.$person->photo) }}" class="person-photo" alt="photo">
                        </td>
                        <td>{{ $person->address }}</td>
                        <td>{{ $person->contact }}</td>
                        <td class="text-center">
                            <form action="{{ route('persons.destroy', $person->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this person?');" class="d-inline">
                                <a href="{{ route('persons.show', $person->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-sm btn-outline-success" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No persons found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
