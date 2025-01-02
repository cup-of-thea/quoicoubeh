<div
    wire:click="toggleLike"
    class="{{ $isLiked ? "text-atomic-tangerine border-atomic-tangerine" : "border-paynes-gray/80" }} flex cursor-pointer items-center gap-x-2 py-1 px-3 rounded border hover:bg-paynes-gray/10"
>
    @if ($isLiked)
        <x-ri-hearts-fill class="h-4 w-4" />
        <p>{{ $likesCount }}</p>
    @else
        <x-ri-hearts-line class="h-4 w-4" />
        <p>{{ $likesCount }}</p>
    @endif
</div>
