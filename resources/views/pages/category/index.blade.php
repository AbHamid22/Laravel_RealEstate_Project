@extends('layouts.master')
@section('title','Manage Category')

@section('style')
<!-- Optional additional styles -->
@endsection


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">



@section('page')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Manage Categories</h3>
        <a class="btn btn-primary" href="{{ route('categorys.create') }}">
            <i class="bi bi-plus-circle"></i> New Category
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($categorys as $category)
        <div class="col">
            <div class="card shadow-sm h-100 border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">
                        <small class="text-muted">Created: {{ $category->created_at }}</small><br>
                        <small class="text-muted">Updated: {{ $category->updated_at }}</small>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                    <a href="{{ route('categorys.show', $category->id) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('categorys.edit', $category->id) }}" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('categorys.destroy', $category->id) }}" method="post" onsubmit="return confirm('Are you sure?')" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mt-2">
    {{ $categorys->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection

@section('script')
<!-- Optional custom scripts -->
@endsection