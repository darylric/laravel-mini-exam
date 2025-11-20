@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
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
                    required>{{ old('content') }}</textarea>
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
                    value="{{ old('published_at') }}">
                @error('published_at')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Publish</button>
        </form>

    </div>
@endsection
