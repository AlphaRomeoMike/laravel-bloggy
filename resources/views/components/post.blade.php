@props(['post' => $post])

<div class="mb-4 mt-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold mt-3">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm ml-2">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
</div>

<p class="mb-2">{{$post->body}}</p>

@can('delete', $post)
    <div>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    </div>
@endcan

<div class="flex item-center mb-4">
    @auth
        @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-3">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        
        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif
    @endauth
    <span class="ml-3">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>