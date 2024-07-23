<x-layout>
<div class="card">

    {{-- @if (session('message'))
            <x-flashMsg msg="{{ session('message') }}" />
        @endif --}}

    <h1 class="mb-4">Please verify email we`ve sent you!</h1>
    <p>Didn`t get the email?</p>
    {{-- verification.send from the route`s ->name('verification.send'); --}}
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button class="btn">Send again</button>
    </form>

</div>

</x-layout>
