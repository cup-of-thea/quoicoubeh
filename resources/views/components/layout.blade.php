<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, user-scalable=no"
        />
        <title>{{ $title ?? config("app.name") }}</title>
        @vite("resources/css/app.css")
        @livewireStyles
    </head>
    <body
        class="{{ Cache::get("theme:" . request()->ip(), "light") }} layout-body"
    >
        <section class="layout-section">
            <aside class="layout-aside-left">
                <livewire:profile />
                <div class="h-14"></div>
                <livewire:theme-selector />
                <livewire:navbar />
                <div class="h-4"></div>
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

            <main class="layout-main">
                {{ $slot }}
            </main>

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
    </body>
</html>
