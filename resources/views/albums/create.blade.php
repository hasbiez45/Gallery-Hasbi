@extends('layouts.app')
@section('content')

<h1>Create Album</h1>
<form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Album name">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">Cover Image</label>
        <input type="file" class="form-control" id="cover_image" name="cover_image" onchange="previewImage(this)">
        <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; margin-top: 10px;">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
