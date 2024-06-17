<x-layout>
    <div class="px-6 py-16 xl:py-32 w-full">
        <h2 class="flex items-center gap-x-2 text-3xl font-bold tracking-tight dark:text-powder sm:text-4xl">
            <x-ri-netflix-fill class="h-10 w-10" />
            {{ $series->title }}
        </h2>
        <div class="grid grid-cols-2 gap-6 pt-6 md:grid-cols-4 xl:grid-cols-4">
            @foreach($posts as $post)
                <x-small-post-item :post="$post"/>
            @endforeach
        </div>
    </div>
</x-layout>
