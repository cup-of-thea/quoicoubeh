<x-layout>
    <div class="px-6 py-16 xl:py-32 w-full">
        <h2 class="flex items-center gap-x-2 text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">
            <x-ri-netflix-fill class="h-10 w-10 text-raspberry" />
            {{ $series->title }}
        </h2>
        <div class="mt-6 space-y-12 pt-6">
            @foreach($posts as $post)
                <x-post-item :post="$post"/>
            @endforeach
        </div>
    </div>
</x-layout>
