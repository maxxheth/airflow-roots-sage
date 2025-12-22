{{--
  Template Name: Learning Center
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <div class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-medium font-geist mb-6" style="background: rgba(139, 92, 246, 0.1); color: rgb(139, 92, 246);">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg>
                {{ $hero->badge }}
            </div>

            <h1 class="sm:text-5xl lg:text-6xl text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
                {{ $hero->title }}
            </h1>

            <p class="sm:text-lg text-base text-neutral-600 font-geist">
                {{ $hero->description }}
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            @php(the_content())
        </div>
    </section>

    @include('partials.contact-form')
  @endwhile
@endsection
