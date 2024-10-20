<div
    wire:click="toggleLike"
    class="{{ $isLiked ? "text-atomic-tangerine" : "" }} flex cursor-pointer items-center gap-x-2"
>
    @if ($isLiked)
        <x-ri-hearts-fill class="h-4 w-4" />
        <p>{{ $likesCount }}</p>
    @else
        <x-ri-hearts-line class="h-4 w-4" />
        <p>{{ $likesCount }}</p>
    @endif
</div>
