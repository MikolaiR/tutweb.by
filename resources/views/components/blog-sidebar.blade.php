@props(['categories', 'tags', 'activeCategory' => null, 'activeTag' => null])

<div class="space-y-8">
    <!-- Search -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">{{ __('messages.search_articles') }}</h3>
        <div class="mt-4">
            <form action="{{ route('blog.index') }}" method="GET">
                <div class="relative rounded-md shadow-sm">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="block w-full rounded-md border-gray-300 pr-10 focus:border-amber-500 focus:ring-amber-500 sm:text-sm"
                           placeholder="{{ __('messages.search_articles') }}">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <button type="submit">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">{{ __('messages.categories') }}</h3>
        <div class="mt-4 space-y-2">
            @foreach($categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                   class="group flex items-center justify-between {{ $activeCategory && $activeCategory->id === $category->id ? 'text-amber-600' : 'text-gray-600 hover:text-amber-600' }}">
                    <span class="text-sm">{{ $category->name }}</span>
                    <span class="text-xs bg-gray-100 rounded-full px-2.5 py-0.5 group-hover:bg-amber-100">{{ $category->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Tags -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">{{ __('messages.popular_tags') }}</h3>
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach($tags as $tag)
                <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                   class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium {{
                       $activeTag && $activeTag->id === $tag->id
                           ? 'bg-amber-100 text-amber-800'
                           : 'bg-gray-100 text-gray-800 hover:bg-amber-100 hover:text-amber-800'
                   }}">
                    {{ $tag->name }}
                    <span class="ml-1.5 text-xs">{{ $tag->posts_count }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>
