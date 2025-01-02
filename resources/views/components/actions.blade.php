@props([
    "post",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Actions
    </div>
    <div class="post-side-section-content">
        <div class="flex items-center gap-1">
            <livewire:like-post-action :post="$post" />
        </div>
    </div>
</section>
