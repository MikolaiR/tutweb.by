@extends('layouts.app')

@section('meta_title', __('messages.professional_web_development_services'))
@section('meta_description', __('messages.web_development_description'))

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="{{ asset('images/hero.jpg') }}" alt="">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">{{ __('messages.professional_web_development') }}</h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl">{{ __('messages.web_development_description') }}</p>
            <div class="mt-10">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                    {{ __('messages.get_started') }}
                </a>
                <a href="{{ route('services.index') }}" class="ml-4 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-amber-600 bg-white hover:bg-gray-50">
                    {{ __('messages.learn_more') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-amber-600 font-semibold tracking-wide uppercase">{{ __('messages.Why Choose Us') }}</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    {{ __('messages.Everything you need for your web project') }}
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    {{ __('messages.We combine technical expertise with creative design to deliver exceptional results.') }}
                </p>
            </div>

            <div class="mt-20">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-amber-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('messages.Modern Technologies') }}</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            {{ __('messages.We use the latest technologies and frameworks to build fast, secure, and scalable web solutions.') }}
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-amber-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('messages.Fast Performance') }}</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            {{ __('messages.Optimized code and efficient architecture ensure your website loads quickly and performs well.') }}
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-amber-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('messages.Security First') }}</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            {{ __('messages.We implement robust security measures to protect your website and user data.') }}
                        </dd>
                    </div>

                    <div class="relative">
                        <dt>
                            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-amber-500 text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ __('messages.24/7 Support') }}</p>
                        </dt>
                        <dd class="mt-2 ml-16 text-base text-gray-500">
                            {{ __('messages.Our dedicated support team is always ready to help you with any questions or issues.') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="bg-white py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ __('messages.our_services') }}</h2>
                <p class="mt-4 text-lg text-gray-500">{{ __('messages.services_description') }}</p>
            </div>
            <div class="mt-20 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <div class="relative group">
                        <div class="relative h-80 w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                            <img src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}" class="h-full w-full object-cover object-center">
                        </div>
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="{{ route('services.show', $service) }}">
                                <span class="absolute inset-0"></span>
                                {{ $service->title }}
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">{{ $service->excerpt }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('services.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700">
                    {{ __('messages.view_all_services') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Latest Articles Section -->
    <div class="bg-white py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ __('messages.latest_articles') }}</h2>
                <p class="mt-4 text-lg text-gray-500">{{ __('messages.latest_articles_description') }}</p>
            </div>
            <div class="mt-12 grid gap-16 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-12">
                @foreach($posts as $post)
                    <div>
                        <div class="relative h-64 w-full overflow-hidden rounded-lg">
                            <img src="{{ $post->getFirstMediaUrl('cover') }}" alt="{{ $post->title }}" class="h-full w-full object-cover">
                        </div>
                        <div class="mt-4">
                            <div class="text-sm text-gray-500">
                                {{ $post->created_at->format('M d, Y') }}
                            </div>
                            <a href="{{ route('blog.show', $post) }}" class="mt-2 block">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h3>
                                <p class="mt-3 text-base text-gray-500">{{ $post->excerpt }}</p>
                            </a>
                            <div class="mt-3">
                                <a href="{{ route('blog.show', $post) }}" class="text-base font-semibold text-amber-600 hover:text-amber-500">
                                    {{ __('messages.read_more') }} →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-100 py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">{{ __('messages.what_clients_say') }}</h2>
                <p class="mt-4 text-lg text-gray-500">{{ __('messages.testimonials_description') }}</p>
            </div>
            <div class="mt-20">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    @foreach($testimonials as $testimonial)
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-center">
                                <img class="h-12 w-12 rounded-full" src="{{ $testimonial->getFirstMediaUrl('avatar') }}" alt="{{ $testimonial->name }}">
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-gray-900">{{ $testimonial->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $testimonial->company }}</p>
                                </div>
                            </div>
                            <p class="mt-6 text-gray-500">{{ $testimonial->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-amber-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">{{ __('messages.ready_to_get_started') }}</span>
                <span class="block text-amber-600">{{ __('messages.contact_us_today') }}</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700">
                        {{ __('messages.get_in_touch') }}
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('portfolio.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-amber-600 bg-white hover:bg-amber-50">
                        {{ __('messages.view_our_work') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
