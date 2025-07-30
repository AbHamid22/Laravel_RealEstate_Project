
@extends('layouts.master')
@section('title','Edit Progesse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('progesses.index')}}">Manage</a>
<form action="{{route('progesses.update',$progesse)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
