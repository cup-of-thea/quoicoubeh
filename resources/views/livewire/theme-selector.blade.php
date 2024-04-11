<div>
    <div class="flex justify-center lg:justify-start items-center gap-x-3" wire:click="toggle">
        <span class="font-medium {{ $theme == 'light' ? 'text-raspberry' : 'text-paynes-gray' }}"><x-ri-sun-line class="h-6 w-6" /></span>
        <button type="button" class="{{ $theme == 'light' ? 'bg-raspberry' : 'bg-moonstone' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-paynes-gray focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="theme-label">
            <span aria-hidden="true" class="{{ $theme == 'light' ? 'translate-x-0' : 'translate-x-5' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
        </button>
        <span class="font-medium {{ $theme == 'light' ? 'text-paynes-gray' : 'text-moonstone' }}"><x-ri-moon-clear-line class="h-6 w-6" /></span>
    </div>
</div>
