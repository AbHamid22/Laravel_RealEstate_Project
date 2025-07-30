@extends('layouts.master')

<head>
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @yield('style')
</head> 
@section('title', 'Create Stock Transfer')

@section('style')
<!-- You can add custom styles here if needed -->
@endsection

@section('page')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Create Stock Transfer</h3>
        <a href="{{ route('stocktranspers.index') }}" class="btn btn-success">
            <i class="bi bi-list-ul"></i> Manage Transfers
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <strong>Stock Transfer Details</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('stocktranspers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="project_id" class="col-sm-2 col-form-label">Project <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select name="project_id" id="project_id" class="form-select" required>
                            <option value="" disabled selected>-- Select Project --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select name="warehouse_id" id="warehouse_id" class="form-select" required>
                            <option value="" disabled selected>-- Select Warehouse --</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="transper_date" class="col-sm-2 col-form-label">Transfer Date <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="date" name="transper_date" id="transper_date" class="form-control" required>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Optional: Add validation or custom JS here -->
@endsection
