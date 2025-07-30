@extends('layouts.master')
@section('title', 'Show Project')

@section('style')
<style>
    .project-card {
        max-width: 600px;
        margin: 2rem auto;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.3s ease-in-out;
    }

    .project-card:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.25);
    }

    .project-img-container {
        overflow: hidden;
        height: 300px;
    }

    .project-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .project-img-container:hover img {
        transform: scale(1.05);
    }

    .card-body .row {
        margin-bottom: 0.75rem;
    }

    .card-body .row strong {
        min-width: 130px;
        display: inline-block;
    }
</style>
@endsection

@section('page')
<a class="btn btn-success mb-3" href="{{ route('projects.index') }}">
    <i class="fas fa-arrow-left"></i> Back to Manage Projects
</a>

<div class="card project-card">
    <div class="project-img-container">
        <img src="{{ asset('img/projects/' . $project->photo) }}" alt="{{ $project->name }}">
    </div>
    <div class="card-body">
        <h4 class="card-title text-center mb-4">{{ $project->name }}</h4>
        <div class="row"><strong>Project ID:</strong> <span>{{ $project->id }}</span></div>
        <div class="row"><strong>Type:</strong> <span>{{ $project->type->name ?? 'N/A' }}</span></div>
        <div class="row"><strong>Status:</strong> <span>{{ $project->status->name ?? 'N/A' }}</span></div>
        <div class="row"><strong>Start Date:</strong> <span>{{ $project->start_date }}</span></div>
        <div class="row"><strong>End Date:</strong> <span>{{ $project->end_date }}</span></div>
        <div class="row"><strong>Contractor:</strong> <span>{{ $project->contractor->name ?? 'N/A' }}</span></div>
        <div class="row"><strong>Created At:</strong> <span>{{ $project->created_at }}</span></div>
        <div class="row"><strong>Updated At:</strong> <span>{{ $project->updated_at }}</span></div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Optional JS to highlight card or interact on load
    document.addEventListener("DOMContentLoaded", function () {
        const card = document.querySelector('.project-card');
        card.style.opacity = 0;
        card.style.transform = 'translateY(30px)';
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, 100);
    });
</script>
@endsection
