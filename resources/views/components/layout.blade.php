<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
</head>

<body>
<div id="app">
    <x-inc.nav />

    <main class="py-4">
        {{ $slot }}
    </main>
</div>
</body>
</html>
