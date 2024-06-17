@php
    use Ramsey\Uuid\Guid\Guid;
@endphp

@props([
    "post",
])

@php
    $aspect = $post->dimensions->cols == $post->dimensions->rows
            ? "aspect-square"
            : $aspect = $post->dimensions->cols > $post->dimensions->rows
                ? "h-full"
                : "h-full min-h-72";

    $cols = $post->dimensions->cols == 2
            ? "col-span-2"
            : "col-span-1";

    $rows = $post->dimensions->rows == 2
            ? "row-span-2"
            : "row-span-1";
@endphp

<a href="/posts/{{ $post->slug }}" class="{{ $cols }} {{ $rows }}">
<article {{ $attributes->merge(["class" => "small-post {$aspect}"]) }}
         style="background-image: url('{{$post->getImage()}}')">
    <div class="w-full grow px-4 py-2 absolute bottom-10 left-1/2 -translate-x-1/2">
        <div class="group relative">
            <h3 class="small-post-title border text-ellipsis group-hover:underline">
                    {{ $post->title }}
            </h3>
        </div>
    </div>

    <div class="flex items-center gap-x-2 bg-powder border-t border-r rounded-tr-3xl px-3 py-1 absolute left-0 bottom-0">
        <x-ri-eye-line class="h-4 w-4"/>
        <span>{{ $post->reading->getReadingCount() }}</span>
    </div>

    <div class="bg-powder border-b border-l rounded-bl-3xl px-3 py-1 absolute right-0 top-0">
        <livewire:likes wire:key="{{ Guid::uuid4() }}" :postId="$post->postId"/>
    </div>
</article>
</a>
