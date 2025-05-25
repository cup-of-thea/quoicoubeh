<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, user-scalable=no"
    />
    {{ $meta ?? "" }}
    <title>{{ $title ?? config("app.name") }}</title>
    @vite("resources/css/app.css")
    @livewireStyles
</head>
<body
        class="layout-body"
>
<main class="layout-main">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
