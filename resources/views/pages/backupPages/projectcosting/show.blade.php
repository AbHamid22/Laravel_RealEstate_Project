@extends('layouts.master')
@section('title','Show Project Costing')

@section('style')
<style>
    .card {
        border-radius: 1rem;
        box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: linear-gradient(90deg, #28a745, #218838);
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        border-radius: 1rem 1rem 0 0;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endsection

@section('page')
<div class="container my-4">
    <a class="btn btn-success mb-3" href="{{ route('projectcostings.index') }}">
        <i class="fas fa-arrow-left"></i> Back to Manage
    </a>

    <div class="card">
        <div class="card-header">
            Project Costing Details
        </div>
        <div class="card-body">
            <table class="table table-borderless table-striped text-nowrap">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $projectcosting->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Project</th>
                        <td>{{ $projectcosting->project->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Module</th>
                        <td>{{ $projectcosting->module->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Budget</th>
                        <td>{{ $projectcosting->budget }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Actual Cost</th>
                        <td>{{ $projectcosting->actual_cost }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Days</th>
                        <td>{{ $projectcosting->days }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <td>{{ $projectcosting->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>{{ $projectcosting->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- FontAwesome (optional, for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
