@extends('layouts.app')

@section('meta_title', __('Our Portfolio'))
@section('meta_description', __('Explore our portfolio of successful web development projects and see how we help businesses achieve their goals.'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">
        {{ __('Our Portfolio') }}
    </h1>
@endsection

@section('content')
    <!-- Filters -->
    <x-portfolio-filters :services="$services" :activeService="$activeService" />

    <!-- Portfolio Grid -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($portfolioItems as $item)
                    <div class="group relative">
                        <div class="relative aspect-w-4 aspect-h-3 bg-gray-100 rounded-lg overflow-hidden">
                            <img src="{{ $item->getFirstMediaUrl('cover') }}" 
                                 alt="{{ $item->title }}" 
                                 class="object-cover object-center w-full h-full transform duration-300 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute inset-0 flex items-end p-6">
                                <div class="translate-y-4 transform opacity-0 transition-all duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                                    <h3 class="text-xl font-semibold text-white">{{ $item->title }}</h3>
                                    <p class="mt-2 text-sm text-gray-200">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('portfolio.show', $item) }}" class="absolute inset-0" aria-label="{{ __('View project details') }}">
                            <span class="sr-only">{{ __('View project details') }}</span>
                        </a>
                        <!-- Project Tags -->
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach($item->services as $service)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    {{ $service->title }}
                                </span>
                            @endforeach
                        </div>
                        <!-- Project Info -->
                        <div class="mt-2">
                            <div class="text-sm text-gray-500">
                                @if($item->client)
                                    <span class="mr-3">{{ $item->client }}</span>
                                @endif
                                @if($item->completed_at)
                                    <span>{{ $item->completed_at->format('Y') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('No projects found') }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ __('Try changing your filters or check back later.') }}</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($portfolioItems->hasPages())
                <div class="mt-12">
                    {{ $portfolioItems->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-amber-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                <span class="block">{{ __('Want to start your project?') }}</span>
                <span class="block text-amber-600">{{ __('Let\'s make it happen.') }}</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                        {{ __('Get Started') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
