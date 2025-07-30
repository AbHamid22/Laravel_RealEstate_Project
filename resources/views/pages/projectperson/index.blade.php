@extends('layouts.master')
@section('title','Manage Project Assignments')

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
</style>
@endsection

@section('page')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Project Assignments</h4>
    <a href="{{ route('projectpersons.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> New Assignment
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>Project</th>
                        <th>Site Supervisor</th>
                        <th>Assigned On</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projectpersons as $projectperson)
                    <tr>
                        <td>{{ $projectperson->id }}</td>
                        <td>{{ $projectperson->project->name ?? 'N/A' }}</td>
                        <td>{{ $projectperson->person->name ?? 'N/A' }}</td>
                        <td>{{ $projectperson->assign_at }}</td>
                        <td>{{ $projectperson->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $projectperson->updated_at->format('Y-m-d H:i') }}</td>
                        <td class="text-center">
                            <form action="{{ route('projectpersons.destroy', $projectperson->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?');" class="d-inline">
                                <a href="{{ route('projectpersons.show', $projectperson->id) }}" class="btn btn-sm btn-outline-primary" title="View">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('projectpersons.edit', $projectperson->id) }}" class="btn btn-sm btn-outline-success" title="Edit">
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
                        <td colspan="7" class="text-center text-muted">No project assignments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $projectpersons->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
@endsection
