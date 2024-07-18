<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- @if (true)
        <h1>Hello</h1>
    @else
        <h1>Bye</h1>
    @endif --}}


    <h1 class="text-4xl">Hello</h1>
</body>

</html>
