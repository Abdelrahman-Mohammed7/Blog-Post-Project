@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success fw-bold">Create New Post</a>
    </div>


    @foreach($posts as $post)
    <div class="card w-100 mb-3 mt-4 shadow-sm">
        <div class="card-body">
            <h3 class="card-title fw-bold">{{ $post->title }}</h3>
            <p class="card-text text-muted">{{ $post->description }}</p>
            <p class="text-secondary"><small>Published on: {{ $post->created_at->format('Y-m-d') }}</small></p>
        </div>
        <div class="card-footer bg-white border-top-0 d-flex justify-content-end gap-2">
            <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-primary">View</a>
        </div>
    </div>
    @endforeach

    <!-- إضافة الترقيم (Pagination) باستخدام أسلوب Bootstrap -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>

</div>

@endsection
