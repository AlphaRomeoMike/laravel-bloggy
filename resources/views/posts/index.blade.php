@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">
                @csrf
                <textarea name="body" id="body" cols="30" rows="10" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write something great!"></textarea>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-2 py-2 rounded font-medium w-full">Post</button>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4 mt-4">
                        <a href="" class="font-bold mt-3">{{ $post->user->name }}</a><span class="text-gray-600 text-sm ml-2">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                    </div>

                    <p class="mb-2">{{$post->body}}</p>

                    <div class="flex item-center mb-4">
                        <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-3">
                            @csrf
                            <button type="submit" class="text-blue-500">Like</button>
                        </form>
                        <form action="" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-500">Unlike</button>
                        </form>
                        <span class="ml-3">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>
                    <hr>
                @endforeach
                <div class="mb-4 mt-4"></div>
                <p id="count-posts">{{ $posts->links() }}</p>
            @else
                <p class="text-bold text-red-300">There are no posts</p>
            @endif
        </div>
    </div>
@endsection