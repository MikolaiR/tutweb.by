@extends('layouts.app')

@section('meta_title', __('messages.contact'))
@section('meta_description', __('messages.contact_description'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">
        {{ __('messages.contact') }}
    </h1>
@endsection

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto md:max-w-none md:grid md:grid-cols-2 md:gap-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                        {{ __('messages.get_in_touch') }}
                    </h2>
                    <div class="mt-3">
                        <p class="text-lg text-gray-500">
                            {{ __('messages.contact_description') }}
                        </p>
                    </div>
                    <div class="mt-9">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3 text-base text-gray-500">
                                <p>{{ config('contact.email') }}</p>
                            </div>
                        </div>
                        <div class="mt-6 flex">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-3 text-base text-gray-500">
                                <p>{{ config('contact.phone') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 sm:mt-16 md:mt-0">
                    @if (session('success'))
                        <div class="rounded-md bg-green-50 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        {{ __('messages.thank_you_message') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.name') }}</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="py-3 px-4 block w-full shadow-sm focus:ring-amber-500 focus:border-amber-500 border-gray-300 rounded-md @error('name') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('messages.email') }}</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="py-3 px-4 block w-full shadow-sm focus:ring-amber-500 focus:border-amber-500 border-gray-300 rounded-md @error('email') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('messages.phone') }}</label>
                            <div class="mt-1">
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="py-3 px-4 block w-full shadow-sm focus:ring-amber-500 focus:border-amber-500 border-gray-300 rounded-md @error('phone') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">{{ __('messages.message') }}</label>
                            <div class="mt-1">
                                <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-amber-500 focus:border-amber-500 border-gray-300 rounded-md @error('message') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">{{ old('message') }}</textarea>
                            </div>
                            @error('message')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                                {{ __('messages.send_message') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
