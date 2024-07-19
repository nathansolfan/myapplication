<x-layout>

    <h1>Welcome Back</h1>

    <x-test2>
    </x-test2>

    <div class="">

        {{-- action= goes the route from the web.php using AuthController --}}
        <form action="{{ route('login')}}" method="POST">
        {{-- security code, mandatory --}}
        @csrf






        {{-- EMAIL --}}
        <div class="mb-4">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{old('username')}}"    class="input @error('email')!ring-red-500 @enderror"  >
        </div>

        {{-- EMAIL ERROR --}}
        @error('email')
            {{-- i have access to $message with laravel --}}
            <p class="error"> {{$message}}</p>
        @enderror




        {{-- PASSWORD --}}
        <div class="mb-4">
            <label for="password">Password</label>
            <input type="text" name="password" value="{{old('username')}}"   class="input @error('password')!ring-red-500 @enderror">
        </div>

        {{-- PW ERROR --}}
        @error('password')
            {{-- i have access to $message with laravel --}}
            <p class="error"> {{$message}}</p>
            @enderror



        {{-- SUBMIT BTN --}}
        <button class="btn">Login</button>
    </form>

    </div>

</x-layout>
