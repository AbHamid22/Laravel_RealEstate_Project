@extends('layouts.master')
@section('title','Manage Contractor')

@section('style')
<!-- Optional: Add custom styles here -->
@endsection

@section('page')
<div class="container mt-4">
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h3>Manage Contractors</h3>
		<a href="{{ route('contractors.create') }}" class="btn btn-primary">New Contractor</a>
	</div>

	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
		@foreach($contractors as $contractor)
		<div class="col">
			<div class="card h-100 shadow-sm">
				<img src="{{ asset('img/'.$contractor->photo) }}" class="card-img-top" alt="{{ $contractor->name }}" style="height: 180px; object-fit: cover;">
				<div class="card-body">
					<h5 class="card-title">{{ $contractor->name }}</h5>
					<p class="card-text"><strong>Contact:</strong> {{ $contractor->contact_info }}</p>
					<p class="text-muted small">Created at: {{ $contractor->created_at->format('d M, Y') }}</p>
				</div>
				<div class="card-footer bg-transparent d-flex justify-content-between">
					<a href="{{ route('contractors.show', $contractor->id) }}" class="btn btn-sm btn-info">View</a>
					<a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-sm btn-success">Edit</a>
					<form action="{{ route('contractors.destroy', $contractor->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this contractor?');">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm" title="Delete">
							<i class="fas fa-trash-alt"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="d-flex justify-content-center mt-2">
    {{ $contractors->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional scripts -->
@endsection