{{-- bg needs an associate array => for default or need to be specifed --}}
@props(['msg', 'bg' => 'bg-green-500'])

<div class="mb-2 text-sm font-medium text-white px-3 py-rounded-md {{$bg}}">
    {{$msg}}
</div>
