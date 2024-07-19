<x-layout>
    
    <h1>Register new User</h1>

    <x-test2>
    </x-test2>

    <div class="">

        {{-- action= goes the route from the web.php using AuthController --}}
        <form action="{{ route('register')}}" method="POST">
        {{-- security code, mandatory --}}
        @csrf


        {{-- USERNAME --}}
        <div class="mb-4">
            <label for="username">Username</label>
            <input type="text" name="username" class="input">
        </div>

        {{-- EMAIL --}}
        <div class="mb-4">
            <label for="email">Email</label>
            <input type="text" name="email" class="input">
        </div>

        {{-- PASSWORD --}}
        <div class="mb-4">
            <label for="password">Password</label>
            <input type="text" name="password" class="input">
        </div>

        {{-- CONFIRM PASSWORD use _confirmation for laravel special rule--}}
        <div class="mb-8">
            <label for="password_confirmation">Confirm Password</label>
            <input type="text" name="password_confirmation" class="input">
        </div>

        {{-- SUBMIT BTN --}}
        <button class="btn">Register</button>
    </form>

    </div>

</x-layout>
