{{-- Service Card Partial --}}
<a href="{{ $url }}" class="group relative bg-white ring-1 ring-neutral-200 rounded-[28px] p-6 hover:shadow-xl transition-all [animation:fadeSlideIn_1s_ease-out_{{ $animationDelay }}_both] animate-on-scroll overflow-hidden">
  <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity" style="background: {{ $colorRgba }};"></div>
  <div class="relative">
    <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: {{ $color }};">
      {!! $icon !!}
    </div>
    <h3 class="text-xl font-semibold tracking-tight font-geist mb-2" style="color: {{ $color }};">
      {{ $title }}
    </h3>
    <p class="text-sm text-neutral-600 mb-4 font-geist">
      {{ $description }}
    </p>
    <div class="flex items-center gap-2 text-sm font-medium font-geist group-hover:gap-3 transition-all" style="color: {{ $color }};">
      Learn More
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
    </div>
  </div>
</a>
