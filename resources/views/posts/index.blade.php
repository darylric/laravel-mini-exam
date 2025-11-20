@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-4">All Posts</h1>

        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-4">
                Create Post
            </a>

            <a href="{{ route('users.posts', auth()->user()->id) }}" class="btn btn-primary mb-4">
                My Posts
            </a>
        @endauth

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">

                    <h3>
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h3>

                    <small class="text-muted">
                        By {{ $post->user->name ?? 'Unknown' }}
                        @if($post->published_at)
                            • {{ $post->published_at->format('M d, Y H:i') }}
                        @endif
                    </small>

                    <p class="mt-2">{{ Str::limit($post->content, 150) }}</p>

                    <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                </div>
            </div>
        @endforeach


        {{ $posts->links() }}


    </div>
@endsection
