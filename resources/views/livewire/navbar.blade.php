<div>
    <ul role="list" class="mt-6 space-y-4">
        @foreach($links as $link)
            <li>
                <a href="{{ $link['url'] }}"
                   class="hover:text-moonstone group flex gap-x-3 rounded-md text-sm leading-6 font-semibold">
                    <x-dynamic-component component="{{ $link['icon'] }}" class="h-5 w-5 shrink-0"/>
                    {{ $link['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
