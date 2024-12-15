@extends('layouts.app')

@section('meta_title', __('Blog'))
@section('meta_description', __('Stay up to date with our latest news, insights, and web development tips.'))

@section('header')
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">{{ __('Blog') }}</h1>
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">{{ __('Discover the latest insights, tips, and trends in web development.') }}</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="bg-white py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                    @if(request('search'))
                        {{ __('messages.search_results_for') }}: "{{ request('search') }}"
                    @elseif($activeCategory)
                        {{ __('messages.posts_in_category') }}: {{ $activeCategory->name }}
                    @elseif($activeTag)
                        {{ __('messages.posts_tagged') }}: {{ $activeTag->name }}
                    @else
                        {{ __('messages.blog') }}
                    @endif
                </h1>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">
                    {{ __('messages.blog_description') }}
                </p>
            </div>

            <div class="mt-12 lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="lg:col-span-8">
                    @if(request('search') || request('category') || request('tag'))
                        <div class="mb-8 flex flex-wrap items-center gap-2">
                            @if(request('search'))
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                    {{ __('Search') }}: {{ request('search') }}
                                    <a href="{{ route('blog.index', array_diff_key(request()->query(), ['search' => ''])) }}" class="ml-1.5 inline-flex items-center">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if($activeCategory)
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                    {{ __('Category') }}: {{ $activeCategory->name }}
                                    <a href="{{ route('blog.index', array_diff_key(request()->query(), ['category' => ''])) }}" class="ml-1.5 inline-flex items-center">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if($activeTag)
                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                    {{ __('Tag') }}: {{ $activeTag->name }}
                                    <a href="{{ route('blog.index', array_diff_key(request()->query(), ['tag' => ''])) }}" class="ml-1.5 inline-flex items-center">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if(request('search') || request('category') || request('tag'))
                                <a href="{{ route('blog.index') }}" class="text-sm text-amber-600 hover:text-amber-500">
                                    {{ __('Clear all filters') }}
                                </a>
                            @endif
                        </div>
                    @endif

                    @if($posts->isEmpty())
                        <div class="text-center">
                            <h3 class="mt-2 text-lg font-medium text-gray-900">{{ __('messages.no_posts_found') }}</h3>
                            <p class="mt-1 text-sm text-gray-500">{{ __('messages.try_different_search') }}</p>
                        </div>
                    @else
                        <div class="space-y-8">
                            @foreach($posts as $post)
                                <article class="relative isolate flex flex-col gap-8 lg:flex-row">
                                    <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                        <img src="{{ $post->getFirstMediaUrl('cover') }}"
                                             alt="{{ $post->title }}"
                                             class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-x-4 text-xs">
                                            <time datetime="{{ $post->published_at->format('Y-m-d') }}" class="text-gray-500">
                                                {{ $post->published_at->format('M j, Y') }}
                                            </time>
                                            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                                               class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                                {{ $post->category->name }}
                                            </a>
                                        </div>
                                        <div class="group relative max-w-xl">
                                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                                <a href="{{ route('blog.show', $post) }}">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $post->title }}
                                                </a>
                                            </h3>
                                            <p class="mt-5 text-sm leading-6 text-gray-600">{{ $post->excerpt }}</p>
                                        </div>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach($post->tags as $tag)
                                                <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                                                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100">
                                                    {{ $tag->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>

                <div class="hidden lg:col-span-4 lg:block">
                    <x-blog-sidebar :categories="$categories" :tags="$tags" :activeCategory="$activeCategory ?? null" :activeTag="$activeTag ?? null" />
                </div>
            </div>
        </div>
    </div>
@endsection
