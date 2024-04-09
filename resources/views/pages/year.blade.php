<x-layout>
    <div class="px-6 py-16 xl:py-32 w-full">
        <h2 class="text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">
            {{ $year }}
        </h2>
        <div class="mt-6 space-y-12 pt-6">
            @foreach($posts as $post)
                <x-post-item :post="$post"/>
            @endforeach
        </div>
    </div>
</x-layout>
