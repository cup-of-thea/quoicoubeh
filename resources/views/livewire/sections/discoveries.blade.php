<div class="generic-component">
    <h2 class="generic-title">Découvertes</h2>
    <div class="mt-16">
        <div class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40">
            <div class="flex max-w-3xl flex-col space-y-16">
                @foreach ($this->posts as $k => $post)
                    <x-small-post-item :post="$post" :k="$k" />
                @endforeach
            </div>
        </div>
    </div>
</div>
