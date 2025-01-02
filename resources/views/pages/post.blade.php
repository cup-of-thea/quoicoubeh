<x-layout>
    <div class="post-container">
        <header class="post-header">
            <h1 class="post-title">
                {{ $post->title }}
            </h1>
            <hr>
        </header>

        <aside class="post-side">
            <x-meta :post="$post" />
            @if($post->image_alt)
                <x-image-alt :alt="$post->image_alt" />
            @endif
            <x-actions :post="$post" />
            @if($post->category)
                <x-category :post="$post" />
            @endif
            @if($post->tags->isNotEmpty())
                <x-tags :post="$post" />
            @endif
            @if($post->episode)
                <x-episode :episode="$post->episode" />
            @endif
            <x-kofi-side />
        </aside>

        <article class="post-main">
            <section class="post-content">
                <div>
                    <img class="object-cover h-128 rounded-xl w-full" src="{{ $post->cover }}" alt="{{ $post->image_alt }}" />
                </div>

                @if ($post->description)
                    <p class="mt-6 text-lg leading-8">
                        {{ $post->description }}
                    </p>
                @endif

                <div
                    class="post-content prose mt-10 max-w-none dark:text-powder/80"
                >
                    <x-markdown>
                        {!! $post->content !!}
                    </x-markdown>
                </div>

                <livewire:post-like-section :post="$post" />
            </section>
        </article>

    </div>

    <x-slot:scripts>
        <script
            async
            src="https://platform.twitter.com/widgets.js"
            charset="utf-8"
        ></script>
        <script
            async
            src="https://embed.bsky.app/static/embed.js"
            charset="utf-8"
        ></script>
        <script async src="https://www.threads.net/embed.js"></script>
        <script
            type="text/javascript"
            async
            src="https://tenor.com/embed.js"
        ></script>
        <script
            async
            src="https://substack.com/embedjs/embed.js"
            charset="utf-9"
        ></script>
    </x-slot>
</x-layout>
