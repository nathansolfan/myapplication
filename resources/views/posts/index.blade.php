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


<div class="grid grid-cols-2 gap-6">

    {{-- from PostController ['name' =>'john'] {{ $posts }} - this dont work on array --}}
    @foreach ( $posts as $post )
    <x-postCard :post="$post" />
    @endforeach
</div>

<div>
    <p> {{$posts->links()}} </p>

</div>


</x-layout>
