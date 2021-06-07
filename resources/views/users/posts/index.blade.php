@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-2">{{ $user->name }}</h1>
                <p>This profile has: <b>{{ $posts->count() }} </b><b> {{ Str::plural('post', $posts->count()) }}</b> and recieved <b>{{ $user->recievedLikes->count() }} likes</b></p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                @endforeach
                    <div class="mb-4 mt-4"></div>
                    <p id="count-posts">{{ $posts->links() }}</p>
                @else
                    <p class="text-bold text-red-300">{{ $user->name }} does not have any posts!</p>
                @endif
            </div>
        </div>
    </div>
@endsection