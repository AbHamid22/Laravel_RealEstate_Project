@extends('layouts.master')
@section('title','Create Progesse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('progesses.index')}}">Manage</a>
<form action="{{route('progesses.store')}}" method ="post" enctype="multipart/form-data">
@csrf

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
