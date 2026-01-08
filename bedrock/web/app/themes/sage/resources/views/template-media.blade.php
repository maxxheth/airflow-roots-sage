{{--
  Template Name: Media
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist mb-6 [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll" style="background: rgba(6, 182, 212, 0.1); color: rgb(6, 182, 212);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                {{ $hero->badge }}
            </div>

            <h1 class="sm:text-5xl lg:text-6xl text-4xl font-bold tracking-tight font-geist mb-6 uppercase [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll" style="color: rgb(0, 57, 118);">
                {{ $hero->title }}
            </h1>

            <p class="sm:text-lg text-base text-neutral-600 font-geist [animation:fadeSlideIn_1s_ease-out_0.3s_both] animate-on-scroll">
                {{ $hero->description }}
            </p>
        </div>

        <div class="max-w-6xl mx-auto">
            @php(the_content())
        </div>
    </section>

    @include('partials.contact-form')
  @endwhile
@endsection
