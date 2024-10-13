<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, user-scalable=no"
        />
        {{ $meta ?? "" }}
        <title>{{ $title ?? config("app.name") }}</title>
        @vite("resources/css/app.css")
        @livewireStyles
        <x-feed-links />
    </head>
    <body
        class="{{ Cache::get("theme:" . request()->ip(), "light") }} layout-body"
    >
        <livewire:navigation-top />

        <main class="layout-main">
            {{ $slot }}
        </main>

        <section class="layout-section">
            <aside class="layout-aside-left">
                <div class="h-4"></div>
                <div class="h-14"></div>
                <div class="hidden lg:block">
                    <livewire:categories />
                    <div class="h-4"></div>
                    <livewire:series />
                    <div class="h-4"></div>
                    <livewire:post-years />
                    <div class="h-4"></div>
                    <livewire:tags />
                </div>
            </aside>

            <aside class="layout-aside-right">
                <livewire:categories />
                <div class="h-4"></div>
                <livewire:series />
                <div class="h-4"></div>
                <livewire:post-years />
                <div class="h-4"></div>
                <livewire:tags />
            </aside>
        </section>
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
