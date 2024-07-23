<x-layout>
{{-- CREATE FORM POST --}}
<div class="card mb-4">
    <h2 class="font-bold mb-4">Create a new Post</h2>


    {{-- SESSION, from the with() method, pass the KEY--}}
    @if (session('success'))
        <x-flashMsg msg="{{ session('success') }}"/>
    @elseif (session('delete'))
        <x-flashMsg msg="{{ session('delete')}}"  bg="bg-red-500"/>
    @endif

<a href="{{route('dashboard')}}" class="block mb-2 text-xs text-blue-500">&larr;Go back to dashboard</a>

<div class="card">
    <h2 class="font-bold mb-4">Update your Post</h2>

    {{-- PostController store() function responsible --}}
    {{-- $post is accepted in controller edit(Post $post), and pass it to the view --}}
    <form action="{{ route('posts.update', $post)}}" method="POST">
    @csrf
    {{-- add method for PUT/PATCH/DELETE --}}
    @method('PUT')

    {{-- POST TITLE --}}
    <div class="mb-4">
        <label for="title">Post Title</label>
        {{-- using $post->title the title is displayed --}}
        <input type="text" name="title" value="{{ $post->title}}"
        class="input @error('title')!ring-red-500 @enderror"
        >
    </div>

    {{-- TITLE ERROR --}}
    @error('title')
        {{-- i have access to $message with laravel --}}
        <p class="error"> {{$message}}</p>
    @enderror


    {{-- POST BODY --}}
    <div class="mb-4">
        <label for="body">Post Content</label>
        <textarea name="body" rows="4"
        class="input @error('body') !ring-red-500 @enderror"
        >{{ $post->body }}</textarea>

    {{-- BODY ERROR --}}
    @error('body')
        {{-- Have access to $message with laravel --}}
        <p class="error"> {{$message}}</p>
    @enderror
    </div>

    {{-- Display picture on the EDIT page --}}
    @if ($post->image)
    <div class="h-64 rounded-md mb-4 w-1/4 object-cover overflow-hidden">
        <label>Current Photo</label>
        <img src=" {{asset('storage/' . $post->image)}} " alt="">
    </div>
    @endif

    {{-- File Upload Input to EDIT --}}

    {{-- POST IMAGE --}}
    <div class="mb-4">
        <label for="image">Cover photo</label>
        <input type="file" name="image" id="image">
    </div>

    @error('image')
        <p class="error"> {{$message}}</p>
    @enderror



    {{-- BUTTON --}}
    <button class="btn">Update</button>
</form>
</div>
</x-layout>
