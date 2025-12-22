{{-- Testimonial Card Partial --}}
<div class="relative bg-white ring-1 ring-neutral-200 rounded-[28px] p-6 [animation:fadeSlideIn_1s_ease-out_{{ $animationDelay }}_both] animate-on-scroll">
  {{-- Star Rating --}}
  <div class="flex gap-1 mb-4">
    @for($i = 0; $i < $rating; $i++)
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#FFC107" stroke="#FFC107" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
      </svg>
    @endfor
  </div>
  
  {{-- Quote --}}
  <p class="text-neutral-700 text-sm leading-relaxed mb-6 font-geist">
    "{{ $quote }}"
  </p>
  
  {{-- Author --}}
  <div class="flex items-center gap-3">
    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-semibold font-geist" style="background: #003976;">
      {{ $initials }}
    </div>
    <div>
      <div class="text-sm font-semibold font-geist" style="color: #003976;">{{ $name }}</div>
      <div class="text-xs text-neutral-500 font-geist">{{ $location }}</div>
    </div>
  </div>
</div>
