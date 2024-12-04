<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <x-nav-link-mine href="{{ route('home') }}" :active="request()->routeIs('home')">Homepage</x-nav-link-mine>
<body>
{{$slot}}
</body>
</html>
