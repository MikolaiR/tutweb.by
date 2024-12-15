@extends('layouts.app')

@section('meta_title', $service->title)
@section('meta_description', $service->description)

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <!-- Image -->
                <div class="relative lg:row-start-1 lg:col-start-2">
                    <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
                        <figure>
                            <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                                <img class="rounded-lg shadow-lg object-cover object-center" src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}">
                            </div>
                        </figure>
                    </div>
                </div>

                <!-- Content -->
                <div class="mt-8 lg:mt-0">
                    <div class="text-base max-w-prose mx-auto lg:max-w-none">
                        <h1 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $service->title }}</h1>
                        <p class="mt-8 text-lg text-gray-500">{{ $service->description }}</p>
                    </div>
                    <div class="mt-5 prose prose-amber text-gray-500 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1">
                        {!! $service->content !!}
                    </div>

                    <!-- Gallery -->
                    @if($service->getMedia('gallery')->count() > 0)
                        <div class="mt-10">
                            <h2 class="text-2xl font-bold text-gray-900">{{ __('Gallery') }}</h2>
                            <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
                                @foreach($service->getMedia('gallery') as $media)
                                    <div class="relative rounded-lg overflow-hidden">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="w-full h-48 object-cover">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-amber-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 md:text-4xl">
                <span class="block">{{ __('Interested in this service?') }}</span>
                <span class="block text-amber-600">{{ __('Let\'s discuss your requirements.') }}</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                        {{ __('Contact Us') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
