@extends('layouts.app')

@section('meta_title', $portfolio->title)
@section('meta_description', $portfolio->description)

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ $portfolio->title }}</h1>
                <p class="mt-4 text-lg text-gray-500">{{ $portfolio->description }}</p>
            </div>

            <!-- Main Image -->
            <div class="mt-12">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="object-cover shadow-lg rounded-lg" src="{{ $portfolio->getFirstMediaUrl('cover') }}" alt="{{ $portfolio->title }}">
                </div>
            </div>

            <!-- Content -->
            <div class="mt-12 prose prose-amber prose-lg text-gray-500 mx-auto">
                {!! $portfolio->content !!}
            </div>

            <!-- Project Details -->
            <div class="mt-12 max-w-3xl mx-auto">
                <div class="bg-gray-50 rounded-lg px-6 py-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Project Details') }}</h2>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        @if($portfolio->client)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">{{ __('Client') }}</dt>
                                <dd class="mt-1 text-base text-gray-900">{{ $portfolio->client }}</dd>
                            </div>
                        @endif

                        @if($portfolio->website)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">{{ __('Website') }}</dt>
                                <dd class="mt-1 text-base text-gray-900">
                                    <a href="{{ $portfolio->website }}" target="_blank" rel="noopener" class="text-amber-600 hover:text-amber-500">
                                        {{ $portfolio->website }}
                                    </a>
                                </dd>
                            </div>
                        @endif

                        @if($portfolio->completed_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">{{ __('Completed') }}</dt>
                                <dd class="mt-1 text-base text-gray-900">{{ $portfolio->completed_at->format('F Y') }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>

            <!-- Gallery -->
            @if($portfolio->getMedia('gallery')->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ __('Project Gallery') }}</h2>
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($portfolio->getMedia('gallery') as $media)
                            <div class="relative aspect-w-3 aspect-h-2">
                                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="object-cover shadow-lg rounded-lg">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-amber-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                <span class="block">{{ __('Like what you see?') }}</span>
                <span class="block text-amber-600">{{ __('Let\'s create something amazing together.') }}</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                        {{ __('Start Your Project') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
