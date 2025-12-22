{{-- Process Step Partial --}}
<div class="text-center [animation:fadeSlideIn_1s_ease-out_{{ $animationDelay }}_both] animate-on-scroll">
  <div class="w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold font-geist mx-auto mb-4" style="background: {{ $color }};">
    {{ $stepNumber }}
  </div>
  <h3 class="text-lg font-semibold tracking-tight font-geist mb-2" style="color: {{ $color }};">
    {{ $title }}
  </h3>
  <p class="text-sm text-neutral-600 font-geist">
    {{ $description }}
  </p>
</div>
