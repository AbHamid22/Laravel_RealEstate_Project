@extends('layouts.master')
@section('title', 'Manage Project')

@section('style')
<style>
    .table thead th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .badge-info {
        background-color: #17a2b8;
        color: #fff;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .project-img-thumb {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>
@endsection

@section('page')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">All Project List</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> New Project
        </a>
    </div>

    @if($projects->count())
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Contractor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset($project->photo ? 'img/projects/' . $project->photo : 'img/placeholder.png') }}" alt="{{ $project->name }}" class="project-img-thumb">
                    </td>
                    <td>{{ $project->name }}</td>
                    <td><span class="badge badge-info">{{ $project->type->name ?? 'N/A' }}</span></td>
                    <td>
                        <span class="badge 
                            {{ strtolower($project->status->name ?? '') === 'completed' ? 'badge-success' : 'badge-warning' }}">
                            {{ $project->status->name ?? 'N/A' }}
                        </span>
                    </td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>{{ $project->contractor->name ?? 'N/A' }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-outline-primary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-success" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $projects->links() }}
    </div>
    @else
        <p class="text-center text-muted">No projects found.</p>
    @endif
</div>
@endsection

@section('script')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
