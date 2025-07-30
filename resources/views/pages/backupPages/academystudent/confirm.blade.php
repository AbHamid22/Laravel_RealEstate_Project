
@extends("layouts.master")

@section("page")
@if (session('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif




  <h2 style="color: red;">Are you sure to permanently delete this student?</h2>

    <br>
<h2>Name :{{$student->name}}</h2>
<img src="{{ asset('img/'.$student->photo) }}" alt="Student Photo" style="max-width:200px; height:auto;">

<form action="{{ route('academystudents.destroy', $student->id) }}" method="post">

      @csrf
      @method("DELETE")
      <input  class="btn btn-danger"  type="submit" value="Yes" />
      <a href="{{ url('academystudents') }}" class="btn btn-secondary">No</a>

    </form>


@endsection



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>