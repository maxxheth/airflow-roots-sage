{{--
  Template Name: Services Page
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section --}}
  <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
    <div class="text-center max-w-4xl mx-auto">
      <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist mb-6 [animation:fadeSlideIn_1s_ease-out_0s_both] animate-on-scroll" style="background: rgba(0, 57, 118, 0.1); color: rgb(0, 57, 118);">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
        {!! $hero->tagline !!}
      </div>
      <h1 class="sm:text-5xl lg:text-6xl leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
        {!! $hero->title !!}
      </h1>
      <p class="sm:text-lg text-base text-neutral-600 mb-8 max-w-3xl mx-auto [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
        {!! $hero->description !!}
      </p>
    </div>
  </section>

  {{-- Services Grid --}}
  <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-20 pl-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($allServices as $service)
        <a href="{{ $service->url }}" class="group bg-white rounded-3xl ring-1 ring-neutral-200 p-8 hover:shadow-xl transition-all [animation:fadeSlideIn_1s_ease-out_{{ $service->delay }}_both] animate-on-scroll">
          <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110" style="background: {{ $service->bgColor }};">
            {!! $service->icon !!}
          </div>
          <h3 class="text-2xl font-semibold tracking-tight font-geist mb-3 uppercase" style="color: {{ $service->color }};">{{ $service->title }}</h3>
          <p class="text-neutral-600 mb-4 font-geist">{{ $service->desc }}</p>
          <div class="flex items-center gap-2 text-sm font-medium font-geist group-hover:gap-3 transition-all" style="color: {{ $service->color }};">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
          </div>
        </a>
      @endforeach
    </div>
  </section>

  {{-- Why Choose Airflow Section --}}
  <section id="why-choose-us" class="lg:px-8 sm:px-8 overflow-hidden mt-20 pt-20 pr-6 pb-20 pl-6 relative" style="background: #003976;">
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(68, 167, 222, 0.2);"></div>
      <div class="absolute -bottom-40 -right-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(20, 168, 80, 0.2);"></div>
    </div>

    <div class="max-w-7xl mx-auto relative">
      <div class="text-center mb-14">
        <h2 class="sm:text-5xl lg:text-6xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold text-white tracking-tight font-geist mb-5 uppercase">
          {!! $whyChoose->title !!}
        </h2>
        <p class="leading-relaxed [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll text-lg text-white/80 max-w-2xl mr-auto ml-auto font-geist">
          {!! $whyChoose->description !!}
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
        @foreach($features as $feature)
          @include('partials.feature-card', ['icon' => $feature->icon, 'title' => $feature->title, 'description' => $feature->description, 'animationDelay' => $feature->animationDelay])
        @endforeach
      </div>
    </div>
  </section>

  {{-- CTA/Contact Section --}}
  @include('partials.contact-form', [
    'heading' => 'READY TO GET STARTED?',
    'subheading' => 'Contact us today for expert HVAC service. Our team is ready to help with all your heating and cooling needs.'
  ])
@endsection
