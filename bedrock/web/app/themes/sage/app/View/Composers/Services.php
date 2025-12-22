<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class Services extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array<int, string>
     */
    protected static $views = [
        'template-services',
    ];

    /**
     * Data to pass to the view.
     *
     * @return array<string, mixed>
     */
    public function with(): array
    {
        return [
            'hero' => $this->getHero(),
            'allServices' => $this->getAllServices(),
            'whyChoose' => $this->getWhyChoose(),
            'features' => $this->getFeatures(),
        ];
    }

    /**
     * Get hero section data.
     */
    protected function getHero(): object
    {
        return DTO::make([
            'tagline' => get_field('services_tagline') ?: 'Full-Service HVAC Solutions',
            'title' => get_field('services_hero_title') ?: 'COMPREHENSIVE HVAC SERVICES FOR YOUR HOME & BUSINESS',
            'description' => get_field('services_hero_desc') ?: 'From installations and repairs to maintenance and indoor air quality, Airflow delivers expert HVAC services to keep your home comfortable year-round.',
        ]);
    }

    /**
     * Get why choose section data.
     */
    protected function getWhyChoose(): object
    {
        return DTO::make([
            'title' => get_field('services_why_title') ?: 'WHY CHOOSE AIRFLOW?',
            'description' => get_field('services_why_desc') ?: 'Trusted by thousands of homeowners in Charlottesville for exceptional service and reliable comfort.',
        ]);
    }

    /**
     * Get all services data.
     *
     * @return array<int, object>
     */
    protected function getAllServices(): array
    {
        return DTO::collection([
            ['title' => 'Heating Services', 'desc' => 'Professional heating system installation, repair, and maintenance for Central Virginia homes and businesses.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v10"></path><path d="M18.4 6.6a9 9 0 1 1-12.77.04"></path></svg>', 'url' => '#heating', 'color' => 'rgb(0, 57, 118)', 'bgColor' => 'rgba(0, 57, 118, 0.1)', 'delay' => '0.1s'],
            ['title' => 'Furnace Installations', 'desc' => 'Professional furnace installation with energy-efficient systems designed for optimal performance and comfort.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#003976" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M8 12h8"></path><path d="M12 8v8"></path></svg>', 'url' => '/furnace-installation', 'color' => 'rgb(0, 57, 118)', 'bgColor' => 'rgba(0, 57, 118, 0.1)', 'delay' => '0.15s'],
            ['title' => 'AC Repairs', 'desc' => 'Fast, reliable air conditioning repairs to keep you cool during the hottest days of summer.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#44A7DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"></path><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path><path d="m4 8 8-4 8 4"></path><path d="M16 12v5"></path><path d="M8 12v5"></path><path d="M12 12v5"></path></svg>', 'url' => '/ac-repairs', 'color' => 'rgb(68, 167, 222)', 'bgColor' => 'rgba(68, 167, 222, 0.1)', 'delay' => '0.2s'],
            ['title' => 'AC Installations', 'desc' => 'Complete air conditioning installation with modern, efficient systems tailored to your home\'s needs.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#44A7DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 8.5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16"></path><path d="M10 8h4"></path><path d="M12 6v4"></path><path d="M21 12h-7"></path><path d="M21 16h-7"></path><path d="M21 20h-7"></path></svg>', 'url' => '/ac-installation', 'color' => 'rgb(68, 167, 222)', 'bgColor' => 'rgba(68, 167, 222, 0.1)', 'delay' => '0.25s'],
            ['title' => 'Heat Pump Services', 'desc' => 'Expert heat pump installation, repair, and maintenance for year-round comfort and energy efficiency.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#14A850" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"></path></svg>', 'url' => '#heat-pumps', 'color' => 'rgb(20, 168, 80)', 'bgColor' => 'rgba(20, 168, 80, 0.1)', 'delay' => '0.3s'],
            ['title' => 'Geothermal Systems', 'desc' => 'Eco-friendly geothermal heating and cooling solutions that save energy and reduce your carbon footprint.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#14A850" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10H12V2Z"></path><path d="M12 2v10"></path><path d="M12 12H2"></path></svg>', 'url' => '/geothermal-systems', 'color' => 'rgb(20, 168, 80)', 'bgColor' => 'rgba(20, 168, 80, 0.1)', 'delay' => '0.35s'],
            ['title' => 'Maintenance Plans', 'desc' => 'Preventive maintenance programs to extend equipment life, improve efficiency, and prevent breakdowns.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>', 'url' => '/maintenance', 'color' => 'rgb(147, 51, 234)', 'bgColor' => 'rgba(147, 51, 234, 0.1)', 'delay' => '0.4s'],
            ['title' => 'Indoor Air Quality', 'desc' => 'Comprehensive air quality testing and solutions to ensure your home has clean, healthy air.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path><path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path><path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path></svg>', 'url' => '/indoor-air-quality-testing', 'color' => 'rgb(6, 182, 212)', 'bgColor' => 'rgba(6, 182, 212, 0.1)', 'delay' => '0.45s'],
            ['title' => 'Smart Thermostats', 'desc' => 'Professional installation of smart thermostats for enhanced comfort control and energy savings.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"></rect><circle cx="12" cy="12" r="1"></circle><path d="M12 8v2"></path><path d="M12 14v2"></path><path d="M8 12h2"></path><path d="M14 12h2"></path></svg>', 'url' => '/smart-thermostats', 'color' => 'rgb(249, 115, 22)', 'bgColor' => 'rgba(249, 115, 22, 0.1)', 'delay' => '0.5s'],
            ['title' => 'Mini-Split Systems', 'desc' => 'Ductless heating and cooling solutions perfect for additions, renovations, or zone control.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M9 3v18"></path><path d="M15 3v18"></path></svg>', 'url' => '/mini-split-systems', 'color' => 'rgb(239, 68, 68)', 'bgColor' => 'rgba(239, 68, 68, 0.1)', 'delay' => '0.55s'],
            ['title' => 'Home Energy Audits', 'desc' => 'Comprehensive energy assessments to identify savings opportunities and improve home efficiency.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>', 'url' => '/home-energy-audits', 'color' => 'rgb(139, 92, 246)', 'bgColor' => 'rgba(139, 92, 246, 0.1)', 'delay' => '0.6s'],
            ['title' => '24/7 Emergency Service', 'desc' => 'Round-the-clock emergency HVAC repairs when you need us most, day or night.', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>', 'url' => '#emergency', 'color' => 'rgb(220, 38, 38)', 'bgColor' => 'rgba(220, 38, 38, 0.1)', 'delay' => '0.65s'],
        ]);
    }

    /**
     * Get features data.
     *
     * @return array<int, object>
     */
    protected function getFeatures(): array
    {
        return DTO::collection([
            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>', 'title' => 'Family-Owned & Operated', 'description' => 'Local business with deep roots in the Charlottesville community for over 30 years.', 'animationDelay' => '0.1s'],
            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>', 'title' => '24/7 Emergency Service', 'description' => 'Round-the-clock availability for urgent heating and cooling repairs when you need us most.', 'animationDelay' => '0.2s'],
            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="m9 12 2 2 4-4"></path></svg>', 'title' => 'NATE-Certified Technicians', 'description' => 'All technicians certified by North American Technician Excellence for quality assurance.', 'animationDelay' => '0.3s'],
            ['icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>', 'title' => '30+ Years Experience', 'description' => 'Three decades of expertise serving residential and commercial HVAC needs.', 'animationDelay' => '0.4s'],
        ]);
    }
}
