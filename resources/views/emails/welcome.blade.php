<h1> Hello {{ $user->username}} </h1>

<div>
    <h2> You created {{ $user->title }} </h2>
    <p> {{$user->body}} </p>

    {{-- special property $message always availalbe with mailable vies --}}
    <img width="300" src=" {{ $message->embed('storage/' . $post->image)}} " alt="">
</div>
