<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <h1>Posts</h1>
            <h2><a href="{{ route('create_view_post') }}">Create post</a></h2>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(isset($error_posts))
                {{ $error_posts }}
            @endif

            @if(isset($posts))
                @foreach($posts as $post)
                    <div class="post col-12 py-3 my-1" style="border: 2px solid grey">
                        <h3 class="title_post">Title: {{ $post->title }}</h3>
                        <p class="descr_post">Description: {{ $post->description }}</p>
                        <p class="created_at">Was created {{ $post->created_at->diffInDays() }} days ago</p>
                        <button type="button" class="btn btn-primary delete_button" data-id="{{ $post->id }}" data-toggle="modal" data-target="#deleteModalConfirm">
                            Delete
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@include('popups/delete_confirm');
</body>
</html>
