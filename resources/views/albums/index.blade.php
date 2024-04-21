@extends('layouts.app')

@section('content')

<style>
    .album-card {
        position: relative;
        overflow: hidden;
    }

    .album-card img {
        transition: transform 0.3s ease;
    }

    .album-card:hover img {
        transform: scale(1.1);
    }

    .album-info {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .album-card:hover .album-info {
        opacity: 1;
    }

    .album-actions {
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
        display: flex;
        justify-content: space-between;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .album-card:hover .album-actions {
        opacity: 1;
    }
</style>

<div class="container bg-f8f6e3">
    <h1 class="text-center container">
        <strong>My Memory</strong>
    </h1>
    <section class="py-5 text-center container">
        <div class="d-grid gap-2 col-6 mx-auto">
            <a class="btn btn-dark color-secondary" href="/albums/create">Make New Album</a>
        </div>
    </section>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($albums as $album)
        <div class="col">
            <div class="shadow album-card">
                <img src="/storage/album_covers/{{$album->cover_image}}" class="card-img-top mb-3" alt="Album Image">
                <div class="album-info">
                    <h5 class="card-title">{{$album->name}}</h5>
                    <p class="card-text">{{$album->description}}</p>
                </div>
                <div class="album-actions">
                    <a href="{{route('albums.show' , $album->id)}}" class="btn btn-primary">View</a>
                    <form method="POST" action="{{ route('albums.destroy', $album->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-between mt-4">
        <p>Showing {{ $albums->firstItem() }} - {{ $albums->lastItem() }} of {{ $albums->total() }} results</p>
        {{ $albums->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
