@extends("layouts.master")

@section("page")

<div class="container mt-5">
    <div class="card shadow-lg p-4" style="max-width: 600px; margin: auto;">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ url("img/$student->photo") }}" alt="Student Photo"
                 style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 2px solid #ddd; margin-right: 20px;">
            <div>
                <h4 class="mb-1">{{ $student->name }}</h4>
                <p class="text-muted mb-0">Student ID: {{ $student->id }}</p>
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <h6 class="text-uppercase text-muted">Details</h6>
            <ul class="list-unstyled">
                <li><strong>ID:</strong> {{ $student->id }}</li>
                <li><strong>Name:</strong> {{ $student->name }}</li>
                {{-- Add more details here if needed --}}
            </ul>
        </div>
    </div>
</div>

@endsection
