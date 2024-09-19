<?php

use Spatie\Feed\Helpers\Cdata;

?>

<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>' .
        PHP_EOL .
        '<?xml-stylesheet href="/vendor/feed/atom.xsl" type="text/xsl"?>'
?>

<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="{{ $meta["language"] }}">
    @foreach ($meta as $key => $metaItem)
        @if ($key === "link")
            <{{ $key }} href="{{ url($metaItem) }}" rel="self"></{{ $key }}>
        @elseif ($key === "title")
            <{{ $key }}>
                {!! Cdata::out($metaItem) !!}
            </{{ $key }}>
        @elseif ($key === "description")
            <subtitle>{{ $metaItem }}</subtitle>
        @elseif ($key === "language")
        @elseif ($key === "image")
            @if (! empty($metaItem))
                <logo>{!! $metaItem !!}</logo>
            @else
            @endif
        @else
            <{{ $key }}>{{ $metaItem }}</{{ $key }}>
        @endif
    @endforeach

    @foreach ($items as $item)
        <entry>
            <title>{!! Cdata::out($item->title) !!}</title>
            <link rel="alternate" href="{{ url($item->link) }}" />
            <id>{{ $item->id }}</id>
            <author>
                <name>
                    {!! Cdata::out($item->authorName) !!}
                </name>
                @if (! empty($item->authorEmail))
                    <email>
                        {!! Cdata::out($item->authorEmail) !!}
                    </email>
                @endif
            </author>
            <summary type="html">
                {!! Cdata::out($item->summary) !!}
            </summary>
            <logo>{!! $item->image !!}</logo>
            <icon>{!! $item->image !!}</icon>
            @if ($item->__isset("enclosure"))
                <link
                    href="{{ url($item->enclosure) }}"
                    length="{{ $item->enclosureLength }}"
                    type="{{ $item->enclosureType }}"
                />
            @endif

            @foreach ($item->category as $category)
                <category term="{{ $category }}" />
            @endforeach

            <updated>{{ $item->timestamp() }}</updated>
        </entry>
    @endforeach
</feed>
