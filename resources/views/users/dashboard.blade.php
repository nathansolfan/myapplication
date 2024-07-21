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

        {{-- created the postCard.blade component and import it here--}}
        {{-- @props ARRAY (['post'])  AND :post="$post" is how an OBJECT is passed--}}
        <x-postCard :post="$post" />
        @endforeach
    </div>

    {{-- PAGINATION -  --}}
    <div>
        {{$posts->links()}}
    </div>


</x-layout>
