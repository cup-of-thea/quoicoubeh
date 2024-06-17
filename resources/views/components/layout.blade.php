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
        class="{{ Cache::get("theme:" . request()->ip(), "light") }} overflow-y-scroll bg-powder font-sans text-rich-black dark:bg-rich-black dark:text-powder"
    >
        <div
            class="mx-auto flex w-full flex-col items-start lg:grid lg:grid-cols-3 lg:justify-items-stretch lg:gap-4 xl:grid-cols-4"
        >
            <aside
                class="mx-auto w-full px-6 py-10 lg:sticky lg:top-8 lg:w-64 lg:px-0 lg:py-0"
            >
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

            <main class="mx-auto my-8 w-full lg:col-span-2 xl:col-span-3">
                {{ $slot }}
            </main>

            <aside
                class="lg:hidden top-8 mx-auto w-full max-w-3xl shrink-0 px-6 lg:sticky lg:top-8 lg:w-64 lg:px-0 lg:py-0"
            >
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
