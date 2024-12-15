@extends('layouts.app')

@section('meta_title', __('Our Services'))
@section('meta_description', __('Explore our comprehensive range of web development services designed to help your business succeed online.'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">
        {{ __('Our Services') }}
    </h1>
@endsection

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <div class="relative group">
                        <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                            <img src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}" class="h-full w-full object-cover object-center">
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-gray-900">
                            <a href="{{ route('services.show', $service) }}">
                                <span class="absolute inset-0"></span>
                                {{ $service->title }}
                            </a>
                        </h3>
                        <p class="mt-2 text-base text-gray-500">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-amber-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                <span class="block">{{ __('Ready to start your project?') }}</span>
                <span class="block text-amber-600">{{ __('Contact us today.') }}</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                        {{ __('Get in Touch') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
