<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sincronizamos - {{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased bg-slate-100 dark:bg-slate-900">
<x-layouts.nav />
    @if(session('status'))
        <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    {{ $slot }}

</body>
</html>