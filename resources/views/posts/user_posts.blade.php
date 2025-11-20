@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-4">Posts by {{ $user->name }}</h1>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h4>
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    </h4>
                    <p>{{ Str::limit($post->content, 120) }}</p>
                </div>
            </div>
        @endforeach


        {{ $posts->links() }}


    </div>
@endsection
