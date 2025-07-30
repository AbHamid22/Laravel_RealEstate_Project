@extends('layouts.master')
@section('title','Edit Progress')

@section('page')
<a class="btn btn-success" href="{{ route('progresses.index') }}">Manage</a>

<form action="{{ route('progresses.update', $progress->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <label for="module_id" class="col-sm-2 col-form-label">Module</label>
        <div class="col-sm-10">
            <select class="form-control" name="module_id" id="module_id">
                @foreach($modules as $module)
                <option value="{{ $module->id }}" {{ $module->id == $progress->module_id ? 'selected' : '' }}>
                    {{ $module->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="project_id" class="col-sm-2 col-form-label">Project</label>
        <div class="col-sm-10">
            <select class="form-control" name="project_id" id="project_id">
                @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $progress->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="percent" class="col-sm-2 col-form-label">Percent</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="percent" value="{{ $progress->percent }}" id="percent">
        </div>
    </div>

    <div class="row mb-3">
        <label for="review" class="col-sm-2 col-form-label">Review</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="review" value="{{ $progress->review }}" id="review">
        </div>
    </div>

    <div class="row mb-3">
        <label for="status_id" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status_id" id="status_id">
                @foreach($status as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="row mb-3">
        <label for="updated_by" class="col-sm-2 col-form-label">Updated By</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="updated_by" value="{{ $progress->updated_by }}" id="updated_by">
        </div>
    </div>

    <div class="row mb-3">
        <label for="expected_completion_date" class="col-sm-2 col-form-label">Expected Completion Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="expected_completion_date" value="{{ $progress->expected_completion_date }}" id="expected_completion_date">
        </div>
    </div>

    <div class="row mb-3">
        <label for="actual_completion_date" class="col-sm-2 col-form-label">Actual Completion Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="actual_completion_date" value="{{ $progress->actual_completion_date }}" id="actual_completion_date">
        </div>
    </div>

    <div class="row mb-3">
        <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="remarks" value="{{ $progress->remarks }}" id="remarks">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection