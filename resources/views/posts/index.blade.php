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
</x-layout>
