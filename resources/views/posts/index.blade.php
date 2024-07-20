 <x-layout>
    @auth()
    <h1>Hello, welcome page</h1>
    {{-- <p>{{ route('register')}}</p> --}}
    @endauth

    @guest()
    <h1>Hello Guest user, welcome page</h1>
    @endguest
    <x-test2>
    </x-test2>

    <h1 class="title" >Lastests Posts:</h1>
    {{-- from PostController ['name' =>'john'] {{ $posts }} - this dont work on array --}}
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
</x-layout>
