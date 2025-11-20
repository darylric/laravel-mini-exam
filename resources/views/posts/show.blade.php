@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $post->title }}</h1>

        <small class="text-muted">
            By {{ $post->user->name ?? 'Unknown' }}
            @if($post->published_at)
                • Published {{ $post->published_at->format('M d, Y H:i') }}
            @endif
        </small>

        <div class="mt-4 mb-4">
            {!! nl2br(e($post->content)) !!}
        </div>

        @auth
            @if(Auth::id() === $post->user_id)
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                </form>
            @endif
        @endauth

        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Back to Posts</a>
        </div>

    </div>
@endsection
