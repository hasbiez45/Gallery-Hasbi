@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{$photo->title}}</h1>
    <a href="/albums/{{$photo->album->id}}" class="btn btn-secondary my-2">Back</a>
    <form action="{{route('photos.destroy', $photo->id)}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this photo?');">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger my-2">Delete</button>
    </form>
    @if($existingLike)
    <form id="like-form-{{$photo->id}}" method="POST" action="{{ route('likes.toggle', $photo->id) }}" class="d-inline">
        @csrf
        @method('DELETE') <!-- Menyesuaikan dengan route Anda -->
        <button type="submit" class="btn btn-sm card-text float-end text-danger shadow fs-5">❤<span>{{$likes->count()}}</span></button>
    </form>
@else
    <form id="like-form-{{$photo->id}}" method="POST" action="{{ route('likes.toggle', $photo->id) }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm card-text float-end">❤<span>{{$likes->count()}}</span></button>
    </form>
@endif


    <div class="photo-container mt-4">
        <img src="/storage/albums/{{$photo->album->id}}/{{$photo->photo}}" alt="Photo" class="img-fluid">
        <p class="photo-description">{{$photo->description}}</p>
    </div>
    <div class="card shadow mt-2">
        <!-- Form Komentar -->
        <form class="card-body comment-form" method="POST" action="{{ route('comments.store', $photo->id) }}">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Comment</button>
        </form>
        <!-- Daftar Komentar -->
        <div class="list-group list-group-flush">
            @foreach ($photo->photoComments as $comment)
            <div class="list-group-item">
                <h6 class="mb-1"><strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span></h6>
                <p class="mb-1">{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Check if the user has liked the current photo
    $.ajax({
        url: "{{ route('likes.check', $photo->id) }}",
        type: "GET",
        success: function(response) {
            if (response.liked) {
                // If already liked, hide the Like button
                $('#like-form-{{$photo->id}}').hide();
            }
        }
    });

    // Event handler for Like form
    $('#like-form-{{$photo->id}}').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var form = $(this);
        var url = form.attr('action');

        // Send AJAX request
        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                // Show message from response
                alert(response.message);

                // Update button display
                form.hide();
                form.siblings('.unlike-form').show();
            },
            error: function(xhr) {
                // Handle errors
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });

    // Event handler for Unlike form
    $('#unlike-form-{{$photo->id}}').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var form = $(this);
        var url = form.attr('action');

        // Send AJAX request
        $.ajax({
            url: url,
            type: 'DELETE',
            data: form.serialize(),
            success: function(response) {
                // Show message from response
                alert(response.message);

                // Update button display
                form.hide();
                form.siblings('.like-form').show();
            },
            error: function(xhr) {
                // Handle errors
                alert('An error occurred: ' + xhr.responseText);
            }
        });
    });
});

</script>
@endsection

<style>
    .photo-container {
        position: relative;
        max-width: 100%;
        overflow: hidden;
        border-radius: 10px;
    }

    .photo-container img {
        width: 100%;
        height: auto;
        display: block;
    }

    .photo-description {
        position: absolute;
        bottom: 10px;
        left: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .comment-form textarea {
        resize: none;
    }

    .list-group-item {
        border: none;
    }
</style>
