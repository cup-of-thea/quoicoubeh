<x-layout>
    <div class="generic-component">
        <h2 class="text-2xl">#{{ $tag->title }}</h2>
    </div>
    <livewire:tag :tag="$tag" />
</x-layout>
