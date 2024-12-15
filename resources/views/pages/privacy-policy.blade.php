@extends('layouts.app')

@section('meta_title', __('Privacy Policy'))
@section('meta_description', __('Our privacy policy explains how we collect, use, and protect your personal information.'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">
        {{ __('Privacy Policy') }}
    </h1>
@endsection

@section('content')
<div class="bg-white">
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="prose prose-amber max-w-none">
            <h2>{{ __('Introduction') }}</h2>
            <p>{{ __('This Privacy Policy describes how TutWeb ("we," "our," or "us") collects, uses, and shares your personal information when you visit our website.') }}</p>

            <h2>{{ __('Information We Collect') }}</h2>
            <p>{{ __('We collect information that you provide directly to us, including:') }}</p>
            <ul>
                <li>{{ __('Name and contact information') }}</li>
                <li>{{ __('Email address') }}</li>
                <li>{{ __('Phone number') }}</li>
                <li>{{ __('Messages you send through our contact form') }}</li>
            </ul>

            <h2>{{ __('How We Use Your Information') }}</h2>
            <p>{{ __('We use the information we collect to:') }}</p>
            <ul>
                <li>{{ __('Respond to your inquiries') }}</li>
                <li>{{ __('Provide our services') }}</li>
                <li>{{ __('Send you updates and marketing communications') }}</li>
                <li>{{ __('Improve our website and services') }}</li>
            </ul>

            <h2>{{ __('Cookies') }}</h2>
            <p>{{ __('We use cookies and similar tracking technologies to track activity on our website and hold certain information. Cookies are files with small amount of data which may include an anonymous unique identifier.') }}</p>
            
            <p>{{ __('You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our website.') }}</p>

            <h2>{{ __('Data Security') }}</h2>
            <p>{{ __('We implement appropriate technical and organizational security measures to protect your personal information. However, please note that no method of transmission over the Internet or electronic storage is 100% secure.') }}</p>

            <h2>{{ __('Your Rights') }}</h2>
            <p>{{ __('You have the right to:') }}</p>
            <ul>
                <li>{{ __('Access your personal information') }}</li>
                <li>{{ __('Correct inaccurate information') }}</li>
                <li>{{ __('Request deletion of your information') }}</li>
                <li>{{ __('Object to our use of your information') }}</li>
                <li>{{ __('Withdraw consent') }}</li>
            </ul>

            <h2>{{ __('Contact Us') }}</h2>
            <p>{{ __('If you have any questions about this Privacy Policy, please contact us:') }}</p>
            <ul>
                <li>{{ __('Email') }}: {{ config('contact.email') }}</li>
                <li>{{ __('Phone') }}: {{ config('contact.phone') }}</li>
                <li>{{ __('Address') }}: {{ config('contact.address') }}</li>
            </ul>

            <h2>{{ __('Changes to This Policy') }}</h2>
            <p>{{ __('We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.') }}</p>
            
            <p class="text-sm text-gray-500 mt-8">{{ __('Last Updated') }}: {{ now()->format('F j, Y') }}</p>
        </div>
    </div>
</div>
@endsection
