<div>
    <ul role="list" class="mt-6 space-y-1">
        @foreach($links as $link)
            <li>
                <a href="{{ $link['url'] }}" class="hover:text-moonstone group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    <x-dynamic-component component="{{ $link['icon'] }}" class="h-6 w-6 shrink-0" />
                    {{ $link['title'] }}
                </a>
            </li>
        @endforeach
    </ul></div>
