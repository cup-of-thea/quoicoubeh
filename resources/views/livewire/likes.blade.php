<div class="flex items-center {{ $isLiked ? 'text-raspberry' : '' }} gap-x-2">
    @if($isLiked)
        <x-ri-heart-3-fill class="w-4 h-4" />
        <p>{{ $likesCount }}</p>
    @else
        <x-ri-heart-3-line class="w-4 h-4" />
        <p>{{ $likesCount }}</p>
    @endif
</div>
