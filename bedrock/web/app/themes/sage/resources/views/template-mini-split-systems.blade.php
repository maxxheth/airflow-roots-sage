{{--
  Template Name: Mini Split Systems
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div class="max-w-xl">
                <div class="flex gap-3 mb-6 items-center">
                    <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist" style="background: rgba(239, 68, 68, 0.1); color: rgb(239, 68, 68);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M9 3v18"></path><path d="M15 3v18"></path></svg>
                        {{ $hero->badge }}
                    </div>
                </div>

                <h1 class="sm:text-5xl lg:text-[56px] leading-[1.05] text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
                    {{ $hero->title }}
                    <span class="block mt-2" style="color: rgb(239, 68, 68);">{{ $hero->subtitle }}</span>
                </h1>

                <p class="sm:text-lg leading-relaxed text-base text-neutral-600 mb-8 font-geist">{{ $hero->description }}</p>

                <div class="flex flex-col sm:flex-row sm:items-stretch gap-4 mb-12">
                    <a href="#contact" class="group inline-flex items-center transition-colors sm:w-auto justify-center font-medium text-white w-full rounded-full py-3 pr-3 pl-6 shadow-lg" style="background: #14A850;">
                        <span class="font-geist">Learn More</span>
                        <span class="ml-3 inline-flex items-center justify-center h-8 w-8 rounded-full bg-white/20 ring-1 ring-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </span>
                    </a>
                    <a href="tel:4349794328" class="group inline-flex items-center gap-2 transition-colors sm:w-auto justify-center font-medium text-white w-full rounded-full py-3 px-6 shadow-lg font-geist" style="background: #003976;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        (434) 979-4328
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="overflow-hidden rounded-[28px] relative shadow-2xl ring-1 ring-black/5">
                    <img src="{{ get_template_directory_uri() }}/public/images/mini-split-systems.jpeg" alt="Mini Split Systems" class="w-full h-[500px] sm:h-[600px] object-cover">
                </div>
            </div>
        </div>
    </section>

    @include('partials.contact-form')
  @endwhile
@endsection
