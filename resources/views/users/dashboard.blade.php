<x-layout>

    <h1> Hello {{ auth()->user()->username }} this is the dashboard</h1>




    {{-- CREATE FORM POST --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new Post</h2>


        {{-- SESSION, from the with() method, pass the KEY--}}
        @if (session('success'))
        <div class="mb-2">
            <x-flashMsg msg="{{ session('success') }}"
            />
        </div>
        @endif


        {{-- PostController store() function responsible --}}
        <form action="{{ route('posts.store')}}" method="POST">
        @csrf

        {{-- POST TITLE --}}
        <div class="mb-4">
            <label for="title">Post Title</label>
            <input type="text" name="title" value="{{old('title')}}"
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
            >{{old('body')}}</textarea>

        {{-- BODY ERROR --}}
        @error('body')
            {{-- Have access to $message with laravel --}}
            <p class="error"> {{$message}}</p>
        @enderror
        </div>

        {{-- BUTTON --}}
        <button class="btn">Create</button>
    </form>
    </div>

    {{-- DISPLAY USER POSTS --}}
    <h2 class="font-bold mb-4">Your lastests posts:</h2>



    <div class="grid grid-cols-2 gap-6">

        {{-- from DashboardController array - [ 'posts' => $posts ] --}}
        @foreach ( $posts as $post )
        <div class="card">

            {{-- TITLE --}}
            <h2 class="font-bold text-xl"> {{ $post->title}} </h2>

            {{-- AUTHOR and DATE diffForHumans() Carbon.com--}}
            <div class="text-xs font-light mb-4">
                <span>Posted {{ $post->created_at->diffForHumans()  }} </span>
                <a href="" class="text-blue-500 font-medium">USERNAME:</a>
            </div>

            {{-- BODY --}}
            <div class="text-xs">
                {{-- Str:words shows the first 15words --}}
                <p> {{  Str::words($post->body, 15) }} </p>
            </div>
        </div>
        @endforeach
    </div>


</x-layout>
