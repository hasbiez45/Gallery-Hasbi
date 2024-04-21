@extends('layouts.app')

@section('content')

<style>
    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.03);
    }
</style>

<section class="py-5 text-center container">
    <div class="row py-lg-5 shadow">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{$album->name}}</h1>
            <p class="lead text-muted">{{$album->description}}</p>
            <p>
                <a href="/photo/upload/{{$album->id}}" class="btn btn-primary my-2">Upload Photo</a>
                <a href="/albums" class="btn btn-secondary my-2">Back</a>
            </p>
        </div>
    </div>
</section>

@if (count($album->photos) > 0)
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($album->photos as $photo)
    <div class="col">
        <div class="shadow">
        <a href="{{route('photos.show' , $photo->id)}}">
            <div class="card">
                <img src="/storage/albums/{{$album->id}}/{{$photo->photo}}" height="250px" class="card-img-top" alt="photo Image">
            </div>
            </a>
        </div>
    </div>
    @endforeach
</div>

@else
<p>No photos to display</p>
@endif

@endsection

