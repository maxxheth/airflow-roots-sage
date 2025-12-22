{{-- Feature Card Partial --}}
<div class="relative bg-white/10 ring-1 ring-white/20 rounded-[28px] p-6 backdrop-blur [animation:fadeSlideIn_1s_ease-out_{{ $animationDelay }}_both] animate-on-scroll">
  <div class="w-12 h-12 rounded-2xl flex items-center justify-center mb-4" style="background: rgba(255, 255, 255, 0.15);">
    {!! $icon !!}
  </div>
  <h3 class="text-white text-xl font-semibold tracking-tight mb-3 font-geist">
    {{ $title }}
  </h3>
  <p class="text-white/80 text-sm leading-relaxed font-geist">
    {{ $description }}
  </p>
</div>
