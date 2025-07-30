@extends('layouts.master')
@section('title','Manage ProjectCosting')

@section('style')
<style>
	.costing-grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
		gap: 20px;
	}

	.card-header-icon {
		font-size: 1.5rem;
		margin-right: 10px;
	}
</style>
@endsection

@section('page')
 <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Project Costing</h1>
    </div>

<!-- <a href="{{ route('projectcostings.create') }}" class="btn btn-primary mb-4">+ New Project Costing</a> -->

@if($projectcostings->isEmpty())
<div class="alert alert-info text-center">No Project Costings found.</div>
@else
<div class="costing-grid">
	@foreach($projectcostings as $projectcosting)
	@php
	$statusColor = match($projectcosting->status) {
	'Pending' => 'warning',
	'Completed' => 'success',
	'In Progress' => 'info',
	'Cancelled' => 'danger',
	default => 'secondary',
	};
	@endphp
	<div class="card shadow-sm border-0 rounded">
		<div class="card-header bg-{{ $statusColor }} text-white d-flex align-items-center">
			<i class="bi bi-folder-fill card-header-icon"></i>
			<div>
				<h5 class="mb-0">{{ $projectcosting->project->name ?? 'Unnamed Project' }}</h5>
				<small>Module: {{ $projectcosting->module->name ?? 'N/A' }}</small>
			</div>
		</div>
		<div class="card-body bg-light">
			<ul class="list-unstyled mb-3">
				<li><strong>💰 Budget:</strong> ৳{{ number_format($projectcosting->budget, 2) }}</li>
				<li><strong>📉 Actual Cost:</strong> ৳{{ number_format($projectcosting->actual_cost, 2) }}</li>
				<li><strong>📅 Days:</strong> {{ $projectcosting->days }}</li>
				<li><strong>✍️ Created By:</strong> {{ $projectcosting->created_by }}</li>
				<li><strong>📝 Remarks:</strong> {{ $projectcosting->remarks ?: 'N/A' }}</li>
			</ul>
			<span class="badge bg-{{ $statusColor }}">{{ $projectcosting->status }}</span>
		</div>
		<div class="card-footer d-flex justify-content-between">
			<a href="{{ route('projectcostings.show', $projectcosting->id) }}" class="btn btn-sm btn-outline-primary">View</a>
			<a href="{{ route('projectcostings.edit', $projectcosting->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
			<form action="{{ route('projectcostings.destroy', $projectcosting->id) }}" method="POST" onsubmit="return confirm('Delete this project costing?'); ">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm btn-outline-danger">
					<i class="bi bi-trash"></i> Delete
				</button>
			</form>
		</div>
	</div>
	@endforeach
</div>
@endif
<div class="d-flex justify-content-center mt-3">
    {{ $projectcostings->links('vendor.pagination.bootstrap-4') }}
</div>

@endsection

@section('script')
<!-- Bootstrap Icons CDN (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection