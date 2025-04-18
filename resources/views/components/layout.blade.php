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
    <x-feed-links/>
    <script defer src="https://api.pirsch.io/pa.js"
            id="pianjs"
            data-code="RWUIFHQXceA9iy6QqvIbdom387a3t4hg"></script>
</head>
<body
        class="{{ Cache::get("theme:" . request()->ip(), "light") }} layout-body"
>
<livewire:navigation-top/>

<main class="layout-main">
    {{ $slot }}
</main>

@livewireScripts
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('theme-changed', (event) => {
            document
                .querySelector('body')
                .classList.remove('light', 'dark');
            document.querySelector('body').classList.add(event);
        });
    });
</script>
{{ $scripts ?? "" }}
</body>
</html>
