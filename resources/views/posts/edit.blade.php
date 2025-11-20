@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ $post->title }}"
                    required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea
                    name="content"
                    rows="6"
                    class="form-control @error('content') is-invalid @enderror"
                    required>{{ $post->content }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Published At</label>
                <input
                    type="datetime-local"
                    name="published_at"
                    class="form-control @error('published_at') is-invalid @enderror"
                    value="{{ optional($post->published_at)->format('Y-m-d\TH:i') }}">
                @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update Post</button>
        </form>

    </div>
@endsection
