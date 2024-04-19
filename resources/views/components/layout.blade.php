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
        class="{{ Cache::get("theme:" . request()->ip(), "light") }} overflow-y-scroll bg-alice-blue font-sans text-paynes-gray dark:bg-black-pearl dark:text-alice-blue"
    >
        <div
            class="mx-auto flex w-full max-w-10xl flex-col items-start px-4 sm:px-6 xl:flex-row xl:px-8"
        >
            <aside
                class="mx-auto w-full max-w-3xl shrink-0 px-6 py-10 xl:sticky xl:top-8 xl:w-64 xl:px-0 xl:py-0"
            >
                <livewire:profile />
            </aside>

            <main class="mx-auto w-full max-w-3xl flex-1">
                {{ $slot }}
            </main>

            <aside
                class="top-8 mx-auto w-full max-w-3xl shrink-0 px-6 xl:sticky xl:w-96 xl:px-0"
            >
                <livewire:theme-selector />
                <livewire:navbar />
                <div class="h-4"></div>
                <hr />
                <div class="h-4"></div>
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
