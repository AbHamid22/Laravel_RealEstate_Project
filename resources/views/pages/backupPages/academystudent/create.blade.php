@extends("layouts.master")

@section("page")

<div class="container mt-4">
    <h2 class="mb-4">Add Academy Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('academystudents') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" onchange="previewImage(event)">
            <div class="mt-2">
                <img id="photoPreview" src="#" alt="Preview" style="display: none; max-width: 150px; border: 1px solid #ccc; padding: 5px;" />
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label">Father's Name</label>
            <input type="text" name="fname" id="fname" class="form-control" value="{{ old('fname') }}" required>
        </div>

        <div class="mb-3">
            <label for="mname" class="form-label">Mother's Name</label>
            <input type="text" name="mname" id="mname" class="form-control" value="{{ old('mname') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label for="cnt" class="form-label">Contact No</label>
            <input type="text" name="cnt" id="cnt" class="form-control" value="{{ old('cnt') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('photoPreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
