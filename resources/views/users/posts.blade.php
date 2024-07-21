<x-layout>

    <h1 class="title">Username</h1>


    {{-- next step is DashboardController - create posts(){view('users.dashboard') } --}}

    {{-- USERS POSTS --}}
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
