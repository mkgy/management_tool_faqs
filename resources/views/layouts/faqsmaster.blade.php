<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vue 3 Accordion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>
        @include('partials.styles')
        @vite('resources/js/main.js')
    </head>
    <body>
        @yield('content')
        @include('partials.footer')
     </body>
</html>