{{--
  Template Name: Home Page
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section --}}
  <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
      {{-- Left: Copy --}}
      <div class="max-w-xl">
        {{-- Trust Badge --}}
        <div class="flex gap-3 mb-6 items-center [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll">
          <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist" style="background: rgba(20, 168, 80, 0.1); color: rgb(20, 168, 80);">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
            30+ Years Experience
          </div>
          <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist" style="background: rgba(0, 57, 118, 0.1); color: rgb(0, 57, 118);">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6v12"></path><path d="M17.196 9 6.804 15"></path><path d="m6.804 9 10.392 6"></path></svg>
            24/7 Service
          </div>
        </div>

        {{-- Headline --}}
        <h1 class="sm:text-5xl lg:text-[56px] leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
          {!! $hero->title !!}
        </h1>

        <p class="sm:text-lg leading-relaxed text-base text-neutral-600 mb-8 [animation:fadeSlideIn_1s_ease-out_0.3s_both] animate-on-scroll font-geist">
          {!! $hero->description !!}
        </p>

        {{-- CTAs --}}
        <div class="flex flex-col sm:flex-row sm:items-stretch gap-4 [animation:fadeSlideIn_1s_ease-out_0.4s_both] animate-on-scroll mb-12 gap-x-4 gap-y-4 items-start">
          <a href="#contact" class="group inline-flex items-center transition-colors sm:w-auto justify-center sm:justify-start font-medium text-white w-full rounded-full py-3 pr-3 pl-6 shadow-lg" style="background: #14A850;">
            <span class="font-geist">Request a Service</span>
            <span class="ml-3 inline-flex items-center justify-center h-8 w-8 rounded-full bg-white/20 ring-1 ring-white/30 group-hover:bg-white/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
            </span>
          </a>

          <a href="tel:(434)979-4328" class="group inline-flex items-center gap-2 transition-colors sm:w-auto justify-center sm:justify-start font-medium text-white w-full rounded-full py-3 px-6 shadow-lg font-geist" style="background: #003976;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            (434) 979-4328
          </a>
        </div>
      </div>

      {{-- Right: Image --}}
      <div class="relative [animation:fadeSlideIn_1s_ease-out_0.3s_both] animate-on-scroll">
        <div class="overflow-hidden rounded-[28px] relative shadow-2xl ring-1 ring-black/5">
          <img src="/media/imgs/happy-family-at-home.jpeg" alt="Happy family inside the home enjoying their air" class="sm:h-[600px] w-full h-[500px] object-cover">
          <div class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur rounded-2xl p-6 shadow-xl">
            <div class="grid grid-cols-3 gap-4">
              <div>
                <div class="text-2xl tracking-tight font-geist font-bold" style="color: rgb(0, 57, 118);">30+</div>
                <div class="text-xs text-neutral-600 font-geist">Years Experience</div>
              </div>
              <div>
                <div class="text-2xl tracking-tight font-geist font-bold" style="color: rgb(20, 168, 80);">5,000+</div>
                <div class="text-xs text-neutral-600 font-geist">Happy Customers</div>
              </div>
              <div>
                <div class="text-2xl tracking-tight font-geist font-bold" style="color: rgb(68, 167, 222);">24/7</div>
                <div class="text-xs text-neutral-600 font-geist">Emergency Service</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Services Overview Section --}}
  <section id="services" class="sm:p-8 bg-white max-w-7xl border-black/5 border rounded-3xl mt-20 mr-auto mb-20 ml-auto pt-12 pr-6 pb-12 pl-6">
    <div class="max-w-3xl mx-auto text-center mb-12">
      <h2 class="sm:text-5xl lg:text-6xl leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-4 uppercase" style="color: rgb(0, 57, 118);">
        COMPLETE HVAC SOLUTIONS
      </h2>
      <p class="sm:text-lg text-base text-neutral-600 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
        From installation to maintenance, we provide comprehensive heating and cooling services for your home comfort.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">
      @foreach($services as $service)
        @include('partials.service-card', $service)
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
          WHY CHOOSE AIRFLOW?
        </h2>
        <p class="leading-relaxed [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll text-lg text-white/80 max-w-2xl mr-auto ml-auto font-geist">
          Trusted by thousands of homeowners in Charlottesville for exceptional service and reliable comfort.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
        @foreach($features as $feature)
          @include('partials.feature-card', $feature)
        @endforeach
      </div>
    </div>
  </section>

  {{-- Customer Testimonials Section --}}
  <section id="testimonials" class="lg:px-8 sm:px-8 mt-20 mb-20 pt-20 pr-6 pb-20 pl-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="sm:text-4xl lg:text-5xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-3xl font-bold tracking-tight font-geist mb-6" style="color: rgb(0, 57, 118);">
          WHAT OUR CUSTOMERS SAY
        </h2>
        <p class="text-neutral-600 text-lg leading-relaxed max-w-2xl mx-auto [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
          Don't just take our word for it. Here's what homeowners in Charlottesville are saying about our service.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
        @foreach($testimonials as $testimonial)
          @include('partials.testimonial-card', $testimonial)
        @endforeach
      </div>
    </div>
  </section>

  {{-- Our Process Section --}}
  <section class="lg:px-8 sm:px-8 max-w-7xl mr-auto ml-auto mt-20 mb-20 pt-20 pr-6 pb-20 pl-6">
    <div class="text-center mb-12">
      <h2 class="sm:text-5xl lg:text-6xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-4 uppercase" style="color: rgb(0, 57, 118);">
        HOW WE WORK
      </h2>
      <p class="sm:text-lg text-base text-neutral-600 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
        From your first call to project completion, we make the experience smooth and stress-free.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-10">
      @foreach($processSteps as $step)
        @include('partials.process-step', $step)
      @endforeach
    </div>
  </section>

  {{-- Contact Form Section --}}
  @include('partials.contact-form')
@endsection
