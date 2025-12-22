{{-- Contact Form Partial --}}
@php
  $defaultHeading = 'GET IN TOUCH';
  $defaultSubheading = 'Ready to improve your home comfort? Contact us today for a free consultation.';
@endphp

<section id="contact" class="sm:px-8 max-w-7xl mr-auto ml-auto pt-20 pr-6 pb-20 pl-6">
  <div class="bg-white rounded-3xl ring-1 ring-neutral-200 p-8 lg:p-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      {{-- Left: Contact Info --}}
      <div>
        <h2 class="sm:text-4xl lg:text-5xl [animation:fadeSlideIn_1s_ease-out_0.1s_both] animate-on-scroll text-3xl font-bold tracking-tight font-geist mb-6 uppercase" style="color: rgb(0, 57, 118);">
          {{ $heading ?? $defaultHeading }}
        </h2>
        <p class="text-neutral-600 text-lg leading-relaxed mb-8 [animation:fadeSlideIn_1s_ease-out_0.2s_both] animate-on-scroll font-geist">
          {{ $subheading ?? $defaultSubheading }}
        </p>
        
        <div class="space-y-6 [animation:fadeSlideIn_1s_ease-out_0.3s_both] animate-on-scroll">
          {{-- Phone --}}
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: rgba(0, 57, 118, 0.1);">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <div>
              <div class="text-sm text-neutral-500 font-geist">Phone</div>
              <a href="tel:(434)979-4328" class="text-lg font-semibold font-geist" style="color: #003976;">(434) 979-4328</a>
            </div>
          </div>
          
          {{-- Email --}}
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: rgba(20, 168, 80, 0.1);">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#14A850" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>
            </div>
            <div>
              <div class="text-sm text-neutral-500 font-geist">Email</div>
              <a href="mailto:info@airflowheatingandair.com" class="text-lg font-semibold font-geist" style="color: #14A850;">info@airflowheatingandair.com</a>
            </div>
          </div>
          
          {{-- Address --}}
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: rgba(68, 167, 222, 0.1);">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#44A7DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <div>
              <div class="text-sm text-neutral-500 font-geist">Address</div>
              <div class="text-lg font-semibold font-geist" style="color: #44A7DE;">Charlottesville, VA</div>
            </div>
          </div>
        </div>
      </div>
      
      {{-- Right: Contact Form --}}
      <div class="[animation:fadeSlideIn_1s_ease-out_0.4s_both] animate-on-scroll">
        <form class="space-y-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">First Name</label>
              <input type="text" class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist" placeholder="John">
            </div>
            <div>
              <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">Last Name</label>
              <input type="text" class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist" placeholder="Doe">
            </div>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">Email</label>
            <input type="email" class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist" placeholder="john@example.com">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">Phone</label>
            <input type="tel" class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist" placeholder="(434) 555-0123">
          </div>
          
          <div>
            <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">Service Needed</label>
            <select class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist">
              <option value="">Select a service...</option>
              <option value="heating">Heating Services</option>
              <option value="cooling">Cooling Services</option>
              <option value="maintenance">Maintenance</option>
              <option value="installation">New Installation</option>
              <option value="emergency">Emergency Repair</option>
              <option value="other">Other</option>
            </select>
          </div>
          
          <div>
            <label class="block text-sm font-medium text-neutral-700 mb-2 font-geist">Message</label>
            <textarea rows="4" class="w-full px-4 py-3 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all font-geist resize-none" placeholder="Tell us about your project..."></textarea>
          </div>
          
          <button type="submit" class="w-full inline-flex items-center justify-center font-medium text-white rounded-full py-4 px-6 shadow-lg transition-all hover:shadow-xl font-geist" style="background: #14A850;">
            Submit Request
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
