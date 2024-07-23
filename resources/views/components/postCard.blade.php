{{-- Layout is almost complete, need the @props ARRAY ['post'] as its using $post --}}
@props(['post', 'full' => false ])
<div class="card">

    {{-- Display Image - points to storage/ and then comes from DB/Posts Table--}}
    <div class="h-52 rounded-md mb-4 w-full object-cover overflow-hidden">
        @if ($post->image)
        <img src=" {{asset('storage/' . $post->image)}} " alt="">
        @else
        <img src=" {{asset('storage/posts_image/ta.webp')}}" alt="">
        @endif
    </div>

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

    {{-- BODY - full() method--}}
    @if ($full)
    <div class="text-sm">
        {{-- Str:words shows the first 15words --}}
        <span>{{($post->body)}}</span>
    </div>

    @else
    <div class="text-sm">
        {{-- Str:words shows the first 15words --}}
        <span>{{Str::words($post->body, 15) }}</span>
        {{-- posts.show from PostController SHOW means GET/$ID --}}
        <a href=" {{ route('posts.show', $post )}} "class="text-blue-500 ml-2">Read more &rarr;</a>
    </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{$slot}}
    </div>
</div>
