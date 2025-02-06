@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-3">
        <div class="card-header bg-primary text-white fw-bold">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong>Title:</strong> {{$post->title}}</h5>
            <p class="card-text"><strong>Description:</strong> {{$post->description}}</p>
            <div class="card-footer bg-white border-top-0 d-flex justify-content-end gap-2">
            
                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-secondary">Edit</a>
                <form method="POST" action="{{ route('posts.destroy', $post['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
        </div>
        </div>
    </div>
</div>
@endsection
