@extends('layouts.app')

@section('content')

<h1>Buat Photo</h1>
<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="title" class="form-label">Teks</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descripsi</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <label for="photo" class="form-label">Photo</label>
    <div class="mb-3" style="display: flex; flex-direction: column; align-items: center;">
        <input type="file" class="form-control" id="photo" name="photo" onchange="previewImage(this)">
        <img id="img-preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; max-height: 300px; margin-top: 10px;">
    </div>
    <input type="hidden" name="album_id" value="{{ $album_id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    function previewImage(input) {
        var preview = document.getElementById('img-preview');
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
