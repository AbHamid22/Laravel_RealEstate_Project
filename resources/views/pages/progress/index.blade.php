@extends('layouts.master')
@section('title','Manage Progress')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    .progress-card {
        margin-bottom: 1.5rem;
        border: 2px solid #0d6efd;
        border-radius: 1rem;
    }

    canvas {
        height: 200px !important;
    }

    .card-header {
        background-color: #e7f1ff;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .badge {
        font-size: 0.9rem;
    }

    .btn {
        font-weight: bold;
    }

    .list-group-item {
        font-weight: 500;
    }

    h1 {
        font-size: 2rem;
        font-weight: 700;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-success {
        background-color: #198754;
        border-color: #198754;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-sm {
        padding: 0.3rem 0.75rem;
        font-size: 0.85rem;
    }

    .bold-text {
        font-weight: bold !important;
        font-family: inherit !important;
    }
</style>
@endsection

@section('page')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0 text-primary">Project Progressive List</h1>
</div>
<a href="{{ route('progresses.create') }}" class="btn btn-primary mb-3 shadow">+</a>

<div class="row">
    @foreach($progresses as $progresse)
    <div class="col-md-6">
        <div class="card progress-card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $progresse->module->name ?? 'N/A' }}</strong>
                <div>
                    <span class="me-2 text-dark fw-bold">
                        @if ($progresse->is_project_complete)
                        100% (Completed)
                        @else
                        {{ $progresse->percent }}%
                        @endif
                    </span>
                    <span class="badge bg-info">{{ $progresse->status->name ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Project:</strong> <span class="bold-text">{{ $progresse->project->name ?? 'N/A' }}</span></p>
                <p><strong>Review:</strong> <span class="bold-text">{{ $progresse->review }}</span></p>
                <p><strong>Remarks:</strong> <span class="bold-text">{{ $progresse->remarks }}</span></p>

                <div class="mb-3 text-center">
                    <canvas id="chart-{{ $progresse->id }}"></canvas>
                </div>

                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>Expected Completion:</strong> {{ $progresse->expected_completion_date }}</li>
                    <li class="list-group-item"><strong>Actual Completion:</strong> {{ $progresse->actual_completion_date ?? 'Pending' }}</li>
                    <li class="list-group-item"><strong>Updated By:</strong> {{ $progresse->updated_by }}</li>
                </ul>

                <div class="d-flex justify-content-between">
                    <a class="btn btn-primary btn-sm" href="{{ route('progresses.show', $progresse->id) }}">View</a>
                    <a class="btn btn-success btn-sm" href="{{ route('progresses.edit', $progresse->id) }}">Edit</a>
                    <form action="{{ route('progresses.destroy', $progresse->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $progresses->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
@endsection