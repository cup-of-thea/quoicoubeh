<div class="generic-component">
    <div
        class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40"
    >
        <div class="flex max-w-3xl flex-col space-y-16">
            @foreach ($posts as $k => $post)
                <x-small-post-item
                    wire:key="post:{{ $post->slug }}"
                    :post="$post"
                    :k="$k"
                />
            @endforeach
        </div>
    </div>
    <!-- Pagination -->
    <div class="h-16"></div>
    {{ $posts->links(data: ["scrollTo" => false]) }}
</div>
