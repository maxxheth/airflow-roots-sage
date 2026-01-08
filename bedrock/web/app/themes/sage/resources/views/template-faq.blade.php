{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
        <div class="text-center mb-12">
            <h1 class="sm:text-5xl lg:text-6xl text-4xl font-bold tracking-tight font-geist mb-4 uppercase [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll" style="color: rgb(0, 57, 118);">
                {{ $heading }}
            </h1>
            <p class="sm:text-lg text-base text-neutral-600 max-w-2xl mx-auto font-geist [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll">
                {{ $subheading }}
            </p>
        </div>

        <div class="max-w-3xl mx-auto">
            @php(the_content())
        </div>
    </section>

    @include('partials.contact-form')
  @endwhile
@endsection
