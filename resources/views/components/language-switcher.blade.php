<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center gap-x-1 text-sm font-medium text-gray-500 hover:text-gray-700">
        <span>{{ config('localization.available')[app()->getLocale()]['native'] }}</span>
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open"
         @click.away="open = false"
         class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
        @foreach(config('localization.available') as $locale => $data)
            @if($locale !== app()->getLocale())
                <a href="{{ route('language.switch', $locale) }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ $data['native'] }}
                </a>
            @endif
        @endforeach
    </div>
</div>
