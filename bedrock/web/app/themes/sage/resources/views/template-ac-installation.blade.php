{{--
  Template Name: AC Installation
  
  Professional air conditioning installation services
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    {{-- Hero Section --}}
    <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div class="max-w-xl">
                {{-- Trust Badge --}}
                <div class="flex gap-3 mb-6 items-center">
                    <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist" style="background: rgba(20, 168, 80, 0.1); color: rgb(20, 168, 80);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path></svg>
                        {{ $hero->trustBadge }}
                    </div>
                </div>

                {{-- Headline --}}
                <h1 class="sm:text-5xl lg:text-[56px] leading-[1.05] text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
                    {{ $hero->title }}
                    <span class="block mt-2" style="color: rgb(20, 168, 80);">{{ $hero->subtitle }}</span>
                </h1>

                <p class="sm:text-lg leading-relaxed text-base text-neutral-600 mb-8 font-geist">
                    {{ $hero->description }}
                </p>

                {{-- CTAs --}}
                <div class="flex flex-col sm:flex-row sm:items-stretch gap-4 mb-12">
                    <a href="#contact" class="group inline-flex items-center transition-colors sm:w-auto justify-center font-medium text-white w-full rounded-full py-3 pr-3 pl-6 shadow-lg" style="background: #14A850;">
                        <span class="font-geist">Schedule Installation</span>
                        <span class="ml-3 inline-flex items-center justify-center h-8 w-8 rounded-full bg-white/20 ring-1 ring-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </span>
                    </a>

                    <a href="tel:4349794328" class="group inline-flex items-center gap-2 transition-colors sm:w-auto justify-center font-medium text-white w-full rounded-full py-3 px-6 shadow-lg font-geist" style="background: #003976;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        (434) 979-4328
                    </a>
                </div>

                {{-- Badge --}}
                <div class="inline-flex items-center gap-3 bg-blue-50 border border-blue-200 rounded-2xl px-5 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span class="text-sm font-medium font-geist" style="color: rgb(0, 57, 118);">{{ $hero->badgeText }}</span>
                </div>
            </div>

            {{-- Image --}}
            <div class="relative">
                <div class="overflow-hidden rounded-[28px] relative shadow-2xl ring-1 ring-black/5">
                    <img src="{{ get_template_directory_uri() }}/public/images/ac-installation.jpeg" alt="AC Installation" class="w-full h-[500px] sm:h-[600px] object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Signs You Need New AC --}}
    <section class="sm:p-8 bg-white max-w-7xl border-black/5 border rounded-3xl mt-20 mr-auto mb-20 ml-auto pt-12 pr-6 pb-12 pl-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="sm:text-4xl lg:text-5xl leading-[1.05] text-3xl font-bold tracking-tight font-geist mb-6 text-center uppercase" style="color: rgb(0, 57, 118);">
                {{ $needs->title }}
            </h2>
            <p class="text-lg text-neutral-700 leading-relaxed text-center font-geist mb-10">
                {{ $needs->description }}
            </p>

            {{-- Signs Grid --}}
            <div class="mt-12">
                <h3 class="text-2xl font-semibold tracking-tight font-geist mb-8 text-center uppercase" style="color: rgb(0, 57, 118);">{{ $needs->signsTitle }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                        $signs = [
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>', 'title' => 'System Age Over 10-15 Years', 'desc' => 'Older units are less efficient and more prone to breakdowns'],
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><path d="M12 2v20M2 12h20"></path></svg>', 'title' => 'Frequent Repairs', 'desc' => 'Constant breakdowns and costly repair bills'],
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>', 'title' => 'Rising Energy Bills', 'desc' => 'Inefficient systems cost more to operate'],
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"></path></svg>', 'title' => 'Inconsistent Temperatures', 'desc' => 'Some rooms too hot while others are too cold'],
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path><line x1="2" x2="2.01" y1="20" y2="20"></line></svg>', 'title' => 'Excessive Noise', 'desc' => 'Loud or unusual sounds from the unit'],
                            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5"><path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path><path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path><path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path></svg>', 'title' => 'Poor Air Quality', 'desc' => 'Excess dust, humidity, or poor ventilation'],
                        ];
                    @endphp

                    @foreach($signs as $sign)
                        <div class="flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-2xl p-5">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                {!! $sign['icon'] !!}
                            </div>
                            <div>
                                <div class="font-medium font-geist mb-1" style="color: rgb(0, 57, 118);">{{ $sign['title'] }}</div>
                                <div class="text-sm text-neutral-700 font-geist">{{ $sign['desc'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form --}}
    @include('partials.contact-form')
  @endwhile
@endsection
