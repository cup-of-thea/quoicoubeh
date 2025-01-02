@props([
    "post",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Meta
    </div>
    <div class="post-side-section-content">
        <div class="flex items-center gap-1">
            <x-ri-calendar-schedule-line class="h-4 w-4" />
            <time datetime="{{ $post->date->format("Y-m-d") }}">
                {{ $post->date->isoFormat("LL") }}
            </time>
        </div>
        <div class="flex items-center gap-1">
            <x-ri-book-open-line class="h-4 w-4" />
            {{ $post->meta->reading_count }} lecture·s
        </div>
        <div class="flex items-center gap-1">
            <x-ri-hourglass-line class="h-4 w-4" />
            {{ $post->meta->reading_time }} min
        </div>
    </div>
</section>
