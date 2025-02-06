@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg rounded-3 p-4">
        <h2 class="text-center text-primary mb-4">Edit Post</h2>

        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input name="title" type="text" value="{{ $post->title }}" class="form-control border-primary" placeholder="Enter post title">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-primary" rows="3" placeholder="Enter post description">{{ $post->description }}</textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-primary w-50">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
