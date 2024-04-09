<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Mono:wght@200..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-alice-blue font-sans text-paynes-gray overflow-y-scroll dark:bg-black-pearl dark:text-alice-blue">
<div class="mx-auto flex flex-col xl:flex-row w-full max-w-10xl items-start xl:gap-x-12 px-4 py-10 sm:px-6 xl:px-8">
    <aside class="xl:sticky top-8 xl:w-64 shrink-0 mx-auto max-w-3xl px-6 xl:px-0">
        <livewire:profile />
    </aside>

    <main class="w-full flex-1 order-last lg:order-none mx-auto max-w-3xl">
        {{ $slot }}
    </main>

    <aside class="xl:sticky top-8 xl:w-96 shrink-0 w-full px-6 xl:px-0 mx-auto max-w-3xl">
        <livewire:navbar />
        <div class="h-8"></div>
        <hr>
        <div class="h-8"></div>
        <livewire:categories />
        <div class="h-4"></div>
        <livewire:series />
        <div class="h-4"></div>
        <livewire:post-years />
        <div class="h-4"></div>
        <livewire:tags />
    </aside>
</div>
@livewireScripts
</body>
</html>
