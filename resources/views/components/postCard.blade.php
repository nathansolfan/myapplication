{{-- Layout is almost complete, need the @props ARRAY ['post'] as its using $post --}}
@props(['post'])
<div class="card">

    {{-- TITLE --}}
    <h2 class="font-bold text-xl"> {{ $post->title}} </h2>

    {{-- AUTHOR and DATE diffForHumans() Carbon.com--}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans()  }} </span>
        {{-- USERNAME relationship to $post, which is taken from the Model/Post user() method/relation --}}
        {{-- route('') fron the ->name('posts.user') in Route folder, and if dinamic add a 2nd param--}}
        {{-- $post->user gives user instance, and with () the relationship --}}
        <a href=" {{ route('posts.user', $post->user )}} " class="text-blue-500 font-medium"> {{$post->user->username}}</a>
    </div>

    {{-- BODY --}}
    <div class="text-xs">
        {{-- Str:words shows the first 15words --}}
        <p> {{  Str::words($post->body, 15) }} </p>
    </div>
</div>
