<x-layout>
    <div>
        <div class="py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl">
                    <h2 class="text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">
                        {{ $year }}
                    </h2>
                    <div class="mt-6 space-y-12 pt-6">
                        @foreach($posts as $post)
                            <x-post-item :post="$post"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
