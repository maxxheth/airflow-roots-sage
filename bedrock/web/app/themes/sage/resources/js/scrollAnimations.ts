/**
 * Scroll Animations
 * 
 * Initializes IntersectionObserver to trigger animations
 * when elements with .animate-on-scroll class enter the viewport.
 */

declare global {
  interface Window {
    __inViewIO?: IntersectionObserver;
    initInViewAnimations?: (selector?: string) => void;
  }
}

export function initScrollAnimations(): void {
  // Configuration for IntersectionObserver
  const once = true; // Unobserve after first intersection
  
  // Create a single global IntersectionObserver if it doesn't exist
  if (!window.__inViewIO) {
    window.__inViewIO = new IntersectionObserver(
      (entries: IntersectionObserverEntry[]) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("animate");
            if (once && window.__inViewIO) {
              window.__inViewIO.unobserve(entry.target);
            }
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: "0px 0px -10% 0px",
      }
    );
  }

  // Global function to initialize animations on specific elements
  window.initInViewAnimations = function (selector: string = ".animate-on-scroll"): void {
    document.querySelectorAll(selector).forEach((el) => {
      if (window.__inViewIO) {
        window.__inViewIO.observe(el);
      }
    });
  };

  // Initialize on all .animate-on-scroll elements
  window.initInViewAnimations();
}
