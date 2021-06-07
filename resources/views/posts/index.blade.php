
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
                    <x-post :post="$post" />
                @endforeach
                <div class="mb-4 mt-4"></div>
                <p id="count-posts">{{ $posts->links() }}</p>
            @else
                <p class="text-bold text-red-300">There are no posts</p>
            @endif
        </div>
    </div>
@endsection