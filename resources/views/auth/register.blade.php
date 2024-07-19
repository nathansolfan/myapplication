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
            <input type="text" name="username" value="{{old('username')}}"  class="input @error('username')!ring-red-500 @enderror">


            {{-- USERNAME ERROR --}}
            @error('username')
            {{-- i have access to $message with laravel --}}
            <p class="error"> {{$message}}</p>
            @enderror
        </div>



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


        {{-- CONFIRM PASSWORD use _confirmation for laravel special rule--}}
        <div class="mb-8">
            <label for="password_confirmation">Confirm Password</label>
            <input type="text" name="password_confirmation" class="input @error('password')!ring-red-500 @enderror">
        </div>

        {{-- SUBMIT BTN --}}
        <button class="btn">Register</button>
    </form>

    </div>

</x-layout>
