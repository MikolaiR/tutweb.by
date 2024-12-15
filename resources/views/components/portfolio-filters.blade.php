@props(['services', 'activeService' => null])

<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Service Filter -->
            <div class="flex items-center space-x-4 overflow-x-auto pb-3 sm:pb-0">
                <a href="{{ route('portfolio.index') }}" 
                   class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium {{ !$activeService ? 'bg-amber-100 text-amber-700' : 'text-gray-500 hover:text-gray-700' }}">
                    {{ __('All Projects') }}
                </a>
                
                @foreach($services as $service)
                    <a href="{{ route('portfolio.index', ['service' => $service->slug]) }}"
                       class="whitespace-nowrap px-3 py-2 rounded-md text-sm font-medium {{ $activeService && $activeService->id === $service->id ? 'bg-amber-100 text-amber-700' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ $service->title }}
                    </a>
                @endforeach
            </div>

            <!-- Sort Options -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" type="button" class="group inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                    <span>{{ __('Sort by') }}</span>
                    <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" 
                     @click.away="open = false"
                     class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu"
                     aria-orientation="vertical"
                     aria-labelledby="sort-menu">
                    <div class="py-1" role="none">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                           role="menuitem">
                            {{ __('Newest First') }}
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                           role="menuitem">
                            {{ __('Oldest First') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
