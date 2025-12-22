{{--
  Template Name: About Page
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section --}}
  <section class="sm:px-8 max-w-7xl mr-auto ml-auto pr-6 pb-16 pl-6 pt-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
      {{-- Left: Copy --}}
      <div class="max-w-xl">
        <h1 class="sm:text-5xl lg:text-[56px] leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
          {!! $hero->title !!}
        </h1>
        
        <p class="sm:text-lg leading-relaxed text-base text-neutral-600 mb-6 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
          {!! $hero->intro !!}
        </p>
        
        <p class="sm:text-lg leading-relaxed text-base text-neutral-600 mb-8 [animation:fadeSlideIn_1s_ease-out_0.3s_both] animate-on-scroll font-geist">
          {!! $hero->description !!}
        </p>
      </div>
      
      {{-- Right: Team Photo --}}
      <div class="relative [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll">
        <div class="overflow-hidden rounded-[28px] relative shadow-2xl ring-1 ring-black/5">
          <img src="/media/imgs/3e2a824c7bbb_photo-1542744173-8e7e53415bb0.jpg" alt="Airflow Team" class="w-full h-[500px] sm:h-[600px] object-cover">
        </div>
      </div>
    </div>
  </section>

  {{-- Mission & About Section --}}
  <section class="lg:px-8 sm:px-8 overflow-hidden mt-20 pt-20 pr-6 pb-20 pl-6 relative" style="background: #003976;">
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(68, 167, 222, 0.2);"></div>
      <div class="absolute -bottom-40 -right-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(20, 168, 80, 0.2);"></div>
    </div>
    
    <div class="max-w-7xl mx-auto relative">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        {{-- Left: Text Content --}}
        <div class="text-left">
          <h2 class="sm:text-5xl lg:text-6xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll uppercase text-4xl font-bold text-white tracking-tight font-geist mb-6">
            {!! $mission->title !!}
          </h2>
          
          @foreach($mission->paragraphs as $index => $paragraph)
            <p class="leading-relaxed [animation:fadeSlideIn_1s_ease-out_{{ ($index + 2) * 0.1 }}s_both] animate-on-scroll text-lg text-white/80 font-geist {{ $index > 0 ? 'mt-4' : '' }}">
              {!! $paragraph !!}
            </p>
          @endforeach
        </div>
        
        {{-- Right: Award Image --}}
        <div class="relative overflow-hidden rounded-[28px] [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll shadow-2xl">
          <img src="/media/imgs/BRHBA-Award-Photo.jpeg" alt="Lifetime Achievement Award" class="lg:h-[700px] w-full h-[600px] object-cover">
          <div class="bg-gradient-to-t from-black/60 to-transparent absolute top-0 right-0 bottom-0 left-0"></div>
          <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <h3 class="text-2xl font-semibold font-geist mb-2">Lifetime Achievement Award</h3>
            <p class="text-base text-white/90 font-geist">Mary and Jimmy North receive the Ridge Home Building Association's Lifetime Achievement Award in recognition of their many years of service with the BRHBA.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Mission & Values Section --}}
  <section class="sm:p-8 bg-white max-w-7xl border-black/5 border rounded-3xl mt-20 mr-auto mb-20 ml-auto pt-12 pr-6 pb-12 pl-6">
    <div class="max-w-3xl mx-auto text-center mb-12">
      <h2 class="sm:text-5xl lg:text-6xl leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-4 uppercase" style="color: rgb(0, 57, 118);">
        {!! $values->title !!}
      </h2>
      <p class="sm:text-lg text-base text-neutral-600 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
        {!! $values->description !!}
      </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
      @foreach($values->items as $index => $value)
        <div class="text-center [animation:fadeSlideIn_1s_ease-out_{{ ($index + 1) * 0.1 }}s_both] animate-on-scroll">
          <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: {{ $value->bgColor }};">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="{{ $value->color }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
              {!! $value->icon !!}
            </svg>
          </div>
          <h3 class="text-xl font-semibold tracking-tight font-geist mb-3 uppercase" style="color: {{ $value->color }};">
            {{ $value->title }}
          </h3>
          <p class="text-sm text-neutral-600 font-geist">
            {{ $value->description }}
          </p>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Community Commitment Section --}}
  <section class="lg:px-8 sm:px-8 overflow-hidden mt-20 pt-20 pr-6 pb-20 pl-6 relative" style="background: #003976;">
    <div class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(68, 167, 222, 0.2);"></div>
      <div class="absolute -bottom-40 -right-40 w-[520px] h-[520px] rounded-full blur-3xl" style="background: rgba(20, 168, 80, 0.2);"></div>
    </div>
    
    <div class="max-w-7xl mx-auto relative">
      <div class="text-center mb-14">
        <h2 class="sm:text-5xl lg:text-6xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold text-white tracking-tight font-geist mb-5 uppercase">
          {!! $community->title !!}
        </h2>
        <p class="leading-relaxed [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll text-lg text-white/80 max-w-2xl mr-auto ml-auto font-geist">
          {!! $community->description !!}
        </p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($community->photos as $index => $photo)
          <div class="relative overflow-hidden rounded-[28px] [animation:fadeSlideIn_1s_ease-out_{{ ($index + 1) * 0.1 }}s_both] animate-on-scroll">
            <img src="{{ $photo->image }}" alt="{{ $photo->title }}" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
              <h3 class="text-lg font-semibold font-geist mb-1">{{ $photo->title }}</h3>
              <p class="text-sm text-white/90 font-geist">{{ $photo->subtitle }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Timeline Section --}}
  <section class="sm:p-8 bg-white max-w-7xl border-black/5 border rounded-3xl mt-20 mr-auto mb-20 ml-auto pt-12 pr-6 pb-12 pl-6">
    <div class="max-w-3xl mx-auto text-center mb-12">
      <h2 class="sm:text-5xl lg:text-6xl leading-[1.05] [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-4xl font-bold tracking-tight font-geist mb-4 uppercase" style="color: rgb(0, 57, 118);">
        {!! $timeline->title !!}
      </h2>
      <p class="sm:text-lg text-base text-neutral-600 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
        {!! $timeline->description !!}
      </p>
    </div>
    
    <div class="max-w-4xl mx-auto">
      @foreach($timeline->items as $index => $item)
        <div class="flex gap-8 {{ $item->hasLine ? 'mb-12' : '' }} [animation:fadeSlideIn_1s_ease-out_{{ ($index + 1) * 0.1 }}s_both] animate-on-scroll">
          <div class="flex flex-col items-center">
            <div class="w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-lg font-geist" style="background: {{ $item->color }};">
              {{ $item->year }}
            </div>
            @if($item->hasLine)
              <div class="w-1 flex-1 mt-4" style="background: #E5E7EB;"></div>
            @endif
          </div>
          <div class="flex-1 {{ $item->hasLine ? 'pb-12' : '' }}">
            <h3 class="text-xl font-semibold tracking-tight font-geist mb-2" style="color: {{ $item->color }};">
              {{ $item->title }}
            </h3>
            <p class="text-neutral-600 font-geist">{{ $item->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Contact Form --}}
  @include('partials.contact-form')
@endsection
