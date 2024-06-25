@php
    use Ramsey\Uuid\Guid\Guid;
@endphp

@props([
    "post",
])

@php
    $aspect =
        $post->dimensions->cols == $post->dimensions->rows
            ? "aspect-square"
            : ($aspect =
                $post->dimensions->cols > $post->dimensions->rows
                    ? "h-full min-h-32"
                    : "h-full min-h-72");

    $cols = $post->dimensions->cols == 2 ? "col-span-2" : "col-span-1";

    $rows = $post->dimensions->rows == 2 ? "row-span-2" : "row-span-1";
@endphp

<a href="/posts/{{ $post->slug }}" class="{{ $cols }} {{ $rows }}">
    <article
        {{ $attributes->merge(["class" => "small-post {$aspect}"]) }}
        style="background-image: url('{{ $post->getImage() }}')"
    >
        <div
            class="absolute bottom-10 left-1/2 w-full grow -translate-x-1/2 px-4 py-2"
        >
            <div class="group relative">
                <h3
                    class="small-post-title text-ellipsis border group-hover:underline"
                >
                    {{ $post->title }}
                </h3>
            </div>
        </div>

        <div
            class="absolute bottom-0 left-0 flex items-center gap-x-2 rounded-tr-3xl border-r border-t bg-powder px-3 py-1"
        >
            <x-ri-eye-line class="h-4 w-4" />
            <span>{{ $post->reading->getReadingCount() }}</span>
        </div>

        <div
            class="absolute right-0 top-0 rounded-bl-3xl border-b border-l bg-powder px-3 py-1"
        >
            <livewire:likes
                wire:key="{{ Guid::uuid4() }}"
                :postId="$post->postId"
            />
        </div>
    </article>
</a>
