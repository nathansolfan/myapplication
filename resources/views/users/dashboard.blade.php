<x-layout>

    <h1 class="title"> Hello {{ auth()->user()->username }} this is the dashboard</h1>
    {{-- $post variable and chain -> method to it --}}
    <p>You have: {{$posts->total()}} posts </p>


    {{-- CREATE FORM POST --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new Post</h2>

        {{-- SESSION, from the with() method, pass the KEY--}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}"/>
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete')}}"  bg="bg-red-500"/>
        @endif

        {{-- !FORM! PostController store() function responsible --}}
        <form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- like delete or $user dont work --}}

        {{-- TITLE POST  --}}
        <div class="mb-4">
            <label for="title">Post Title</label>
            <input type="text" name="title" value="{{ old('title')}}"
            class="input @error('title')!ring-red-500 @enderror"
            >
        </div>

        {{-- TITLE ERROR --}}
        @error('title')
            {{-- Have access to $message with laravel --}}
            <p class="error"> {{$message}}</p>
        @enderror


        {{-- BODY POST  --}}
        <div class="mb-4">
            <label for="body">Post Content</label>
            <textarea name="body" rows="4"
            class="input @error('body') !ring-red-500 @enderror"
            >{{old('body')}}</textarea>

        {{-- BODY ERROR --}}
        @error('body')
            <p class="error"> {{$message}}</p>
        @enderror
        </div>

        {{-- POST IMAGE --}}
        <div class="mb-4">
            <label for="image">Cover photo</label>
            <input type="file" name="image" id="image">
        </div>

        @error('image')
            <p class="error"> {{$message}}</p>
        @enderror

        {{-- BUTTON SUBMIT --}}
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
        <x-postCard :post="$post">

            {{-- UPDATE --}}
            <a class="bg-green-500 text-white px-2 py-1 text-xs rounded-md" href=" {{route('posts.edit', $post)}}">Update</a>


            {{-- DELETE button  Action, takes the route and a post parameter $post--}}
            <form action=" {{route('posts.destroy', $post)}}" method="POST">
                @csrf
                {{-- method:"POST" dont work and need the @method(if delete,put,patch) --}}
                @method('DELETE')
                <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
            </form>
        </x-postCard>
        @endforeach
    </div>



    {{-- PAGINATION -  --}}
    <div>
        {{$posts->links()}}
    </div>


</x-layout>
