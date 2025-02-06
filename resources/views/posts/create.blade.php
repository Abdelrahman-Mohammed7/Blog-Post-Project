@extends('layouts.app')

@section('title') Create @endsection

@section('content')

<div class="container mt-5">
    <div class="card shadow-lg rounded-3 p-4">
        <h2 class="text-center text-primary mb-4">Create New Post</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input name="title" type="text" class="form-control border-primary" value="{{ old('title') }}" placeholder="Enter post title">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control border-primary" rows="3" placeholder="Enter post description">{{ old('description') }}</textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-success w-50">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
