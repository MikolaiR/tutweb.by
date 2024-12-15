@extends('layouts.app')

@section('meta_title', $post->title)
@section('meta_description', $post->excerpt)

@section('content')
    <article class="bg-white py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="text-center">
                    <div class="flex items-center justify-center gap-x-4 text-xs">
                        <time datetime="{{ $post->published_at->format('Y-m-d') }}" class="text-gray-500">
                            {{ __('messages.published_at') }}: {{ $post->published_at->format('M d, Y') }}
                        </time>
                        @if($post->category)
                            <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                               class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                {{ $post->category->name }}
                            </a>
                        @endif
                    </div>
                    <h1 class="mt-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $post->title }}</h1>
                </div>

                @if($post->image)
                    <div class="mt-8 aspect-[16/9]">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                             class="rounded-2xl object-cover">
                    </div>
                @endif

                <div class="mt-8 prose prose-lg prose-amber mx-auto">
                    {!! $post->content !!}
                </div>

                @if($post->tags->isNotEmpty())
                    <div class="mt-8 flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                               class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-sm font-medium text-gray-600 hover:bg-gray-100">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                @endif

                <div class="mt-12 flex items-center justify-between">
                    @if($previousPost)
                        <a href="{{ route('blog.show', $previousPost) }}"
                           class="group inline-flex items-center gap-x-2 text-sm font-semibold text-gray-900 hover:text-gray-600">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-600"
                                 viewBox="0 0 20 20"
                                 fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M15.79 14.77a.75.75 0 01-1.06.02l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 111.04 1.08L11.832 10l3.938 3.71a.75.75 0 01.02 1.06zm-6 0a.75.75 0 01-1.06.02l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 111.04 1.08L5.832 10l3.938 3.71a.75.75 0 01.02 1.06z"
                                      clip-rule="evenodd"/>
                            </svg>
                            {{ __('messages.previous_post') }}
                        </a>
                    @endif

                    @if($nextPost)
                        <a href="{{ route('blog.show', $nextPost) }}"
                           class="group inline-flex items-center gap-x-2 text-sm font-semibold text-gray-900 hover:text-gray-600">
                            {{ __('messages.next_post') }}
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-600"
                                 viewBox="0 0 20 20"
                                 fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M3.21 14.77a.75.75 0 01.02-1.06L7.168 10 3.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @endif
                </div>

                @if($relatedPosts->isNotEmpty())
                    <div class="mt-16">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ __('messages.related_articles') }}</h2>
                        <div class="mt-6 grid gap-8 lg:grid-cols-2">
                            @foreach($relatedPosts as $relatedPost)
                                <article class="relative isolate flex flex-col gap-8">
                                    @if($relatedPost->image)
                                        <div class="relative aspect-[16/9]">
                                            <img src="{{ asset('storage/' . $relatedPost->image) }}"
                                                 alt="{{ $relatedPost->title }}"
                                                 class="absolute inset-0 h-full w-full rounded-2xl object-cover">
                                        </div>
                                    @endif
                                    <div class="max-w-xl">
                                        <div class="flex items-center gap-x-4 text-xs">
                                            <time datetime="{{ $relatedPost->published_at->format('Y-m-d') }}"
                                                  class="text-gray-500">
                                                {{ $relatedPost->published_at->format('M d, Y') }}
                                            </time>
                                            @if($relatedPost->category)
                                                <a href="{{ route('blog.index', ['category' => $relatedPost->category->slug]) }}"
                                                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                                    {{ $relatedPost->category->name }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="group relative">
                                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                                <a href="{{ route('blog.show', $relatedPost) }}">{{ $relatedPost->title }}</a>
                                            </h3>
                                            <p class="mt-5 text-sm leading-6 text-gray-600">{{ $relatedPost->excerpt }}</p>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('blog.show', $relatedPost) }}"
                                               class="text-sm font-semibold leading-6 text-amber-600 hover:text-amber-500">
                                                {{ __('messages.read_more') }} <span aria-hidden="true">→</span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
@endsection
