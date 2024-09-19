@php
    use Spatie\Feed\Helpers\FeedContentType;
@endphp

@foreach ($feeds as $name => $feed)
    <link
        rel="alternate"
        type="{{ FeedContentType::forLink($feed["format"] ?? "atom") }}"
        href="{{ route("feeds.{$name}") }}"
        title="{{ $feed["title"] }}"
    />
@endforeach
