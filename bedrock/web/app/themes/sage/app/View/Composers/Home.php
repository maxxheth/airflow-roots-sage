<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use stdClass;

class Home extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array<int, string>
     */
    protected static $views = [
        'template-home',
        'front-page',
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
            'services' => $this->getServices(),
            'features' => $this->getFeatures(),
            'testimonials' => $this->getTestimonials(),
            'processSteps' => $this->getProcessSteps(),
        ];
    }

    /**
     * Get hero section data as clean DTO.
     */
    protected function getHero(): stdClass
    {
        $hero = new stdClass();
        $hero->title = get_field('hero_title') ?: 'YOUR TRUSTED PARTNER FOR HOME COMFORT IN CHARLOTTESVILLE';
        $hero->description = get_field('hero_description') ?: 'Expert HVAC Repair, Installation, and Maintenance. Family-owned and operated, serving the Charlottesville community with certified technicians and guaranteed satisfaction.';
        
        return $hero;
    }

    /**
     * Get service cards data (hybrid: ACF titles/descriptions, static structure).
     *
     * @return array<int, stdClass>
     */
    protected function getServices(): array
    {
        $services = [];

        // Heating
        $heating = new stdClass();
        $heating->title = get_field('heating_title') ?: 'HEATING';
        $heating->description = get_field('heating_description') ?: 'Furnace repair, installation, and maintenance to keep you warm all winter.';
        $heating->url = '#heating';
        $heating->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v10"></path><path d="M18.4 6.6a9 9 0 1 1-12.77.04"></path></svg>';
        $heating->color = '#003976';
        $heating->colorRgba = 'rgba(0, 57, 118, 0.03)';
        $heating->borderColorRgba = 'rgba(0, 57, 118, 0.1)';
        $heating->animationDelay = '0.1s';
        $services[] = $heating;

        // Cooling
        $cooling = new stdClass();
        $cooling->title = get_field('cooling_card_title') ?: 'COOLING';
        $cooling->description = get_field('cooling_card_description') ?: 'AC repair, replacement, and tune-ups for optimal summer comfort.';
        $cooling->url = '#cooling';
        $cooling->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"></path><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"></path><path d="m4 8 8-4 8 4"></path><path d="M16 12v5"></path><path d="M8 12v5"></path><path d="M12 12v5"></path></svg>';
        $cooling->color = '#44A7DE';
        $cooling->colorRgba = 'rgba(68, 167, 222, 0.03)';
        $cooling->borderColorRgba = 'rgba(68, 167, 222, 0.1)';
        $cooling->animationDelay = '0.2s';
        $services[] = $cooling;

        // Maintenance
        $maintenance = new stdClass();
        $maintenance->title = get_field('maintenance_card_title') ?: 'MAINTENANCE';
        $maintenance->description = get_field('maintenance_card_description') ?: 'Preventive maintenance plans to extend system life and efficiency.';
        $maintenance->url = '#maintenance';
        $maintenance->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>';
        $maintenance->color = '#14A850';
        $maintenance->colorRgba = 'rgba(20, 168, 80, 0.03)';
        $maintenance->borderColorRgba = 'rgba(20, 168, 80, 0.1)';
        $maintenance->animationDelay = '0.3s';
        $services[] = $maintenance;

        // Geothermal
        $geothermal = new stdClass();
        $geothermal->title = get_field('geothermal_card_title') ?: 'GEOTHERMAL';
        $geothermal->description = get_field('geothermal_card_description') ?: 'Eco-friendly geothermal systems for efficient heating and cooling.';
        $geothermal->url = '#geothermal';
        $geothermal->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 1 0 10 10H12V2Z"></path><path d="M12 2v10"></path><path d="M12 12H2"></path></svg>';
        $geothermal->color = 'linear-gradient(135deg, #003976, #14A850)';
        $geothermal->colorRgba = 'rgba(0, 57, 118, 0.03)';
        $geothermal->borderColorRgba = 'rgba(0, 57, 118, 0.1)';
        $geothermal->animationDelay = '0.4s';
        $services[] = $geothermal;

        return $services;
    }

    /**
     * Get features data for "Why Choose Us" section.
     * 
     * @return array<int, stdClass>
     */
    protected function getFeatures(): array
    {
        $features = [];

        $feature1 = new stdClass();
        $feature1->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>';
        $feature1->title = 'Family-Owned & Operated';
        $feature1->description = 'Local business with deep roots in the Charlottesville community for over 30 years.';
        $feature1->animationDelay = '0.1s';
        $features[] = $feature1;

        $feature2 = new stdClass();
        $feature2->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>';
        $feature2->title = '24/7 Emergency Service';
        $feature2->description = 'Round-the-clock availability for urgent heating and cooling repairs when you need us most.';
        $feature2->animationDelay = '0.2s';
        $features[] = $feature2;

        $feature3 = new stdClass();
        $feature3->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="m9 12 2 2 4-4"></path></svg>';
        $feature3->title = 'NATE-Certified Technicians';
        $feature3->description = 'All technicians certified by North American Technician Excellence for quality assurance.';
        $feature3->animationDelay = '0.3s';
        $features[] = $feature3;

        $feature4 = new stdClass();
        $feature4->icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
        $feature4->title = '30+ Years Experience';
        $feature4->description = 'Three decades of expertise serving residential and commercial HVAC needs.';
        $feature4->animationDelay = '0.4s';
        $features[] = $feature4;

        return $features;
    }

    /**
     * Get testimonials data.
     * 
     * @return array<int, stdClass>
     */
    protected function getTestimonials(): array
    {
        $testimonials = [];

        $testimonial1 = new stdClass();
        $testimonial1->rating = 5;
        $testimonial1->quote = 'Airflow responded within an hour when our AC died on the hottest day of summer. The technician was professional, efficient, and had us up and running in no time. Highly recommend!';
        $testimonial1->name = 'Sarah Mitchell';
        $testimonial1->location = 'Homeowner, Charlottesville';
        $testimonial1->initials = 'SM';
        $testimonial1->animationDelay = '0.1s';
        $testimonials[] = $testimonial1;

        $testimonial2 = new stdClass();
        $testimonial2->rating = 5;
        $testimonial2->quote = 'We\'ve been using Airflow for our maintenance plan for 5 years. Their preventive care has saved us money and headaches. The team is always courteous and thorough.';
        $testimonial2->name = 'James Thompson';
        $testimonial2->location = 'Homeowner, Albemarle';
        $testimonial2->initials = 'JT';
        $testimonial2->animationDelay = '0.2s';
        $testimonials[] = $testimonial2;

        $testimonial3 = new stdClass();
        $testimonial3->rating = 5;
        $testimonial3->quote = 'From quote to installation, everything was seamless. They helped us choose the perfect system for our home and our energy bills have dropped significantly. Great investment!';
        $testimonial3->name = 'Linda Chen';
        $testimonial3->location = 'Homeowner, Crozet';
        $testimonial3->initials = 'LC';
        $testimonial3->animationDelay = '0.3s';
        $testimonials[] = $testimonial3;

        return $testimonials;
    }

    /**
     * Get process steps data.
     * 
     * @return array<int, stdClass>
     */
    protected function getProcessSteps(): array
    {
        $steps = [];

        $step1 = new stdClass();
        $step1->stepNumber = 1;
        $step1->title = 'CONTACT US';
        $step1->description = 'Call us or fill out our online form. We respond quickly to all inquiries.';
        $step1->color = 'rgb(0, 57, 118)';
        $step1->colorRgba = 'rgba(0, 57, 118, 0.1)';
        $step1->animationDelay = '0.1s';
        $steps[] = $step1;

        $step2 = new stdClass();
        $step2->stepNumber = 2;
        $step2->title = 'SCHEDULE ASSESSMENT';
        $step2->description = 'We visit your home to assess your needs and provide a detailed estimate.';
        $step2->color = 'rgb(68, 167, 222)';
        $step2->colorRgba = 'rgba(68, 167, 222, 0.1)';
        $step2->animationDelay = '0.2s';
        $steps[] = $step2;

        $step3 = new stdClass();
        $step3->stepNumber = 3;
        $step3->title = 'EXPERT SERVICE';
        $step3->description = 'Our certified technicians perform the work efficiently and professionally.';
        $step3->color = 'rgb(20, 168, 80)';
        $step3->colorRgba = 'rgba(20, 168, 80, 0.1)';
        $step3->animationDelay = '0.3s';
        $steps[] = $step3;

        $step4 = new stdClass();
        $step4->stepNumber = 4;
        $step4->title = 'FOLLOW-UP';
        $step4->description = 'We ensure your complete satisfaction and provide ongoing support.';
        $step4->color = 'rgb(0, 57, 118)';
        $step4->colorRgba = 'rgba(0, 57, 118, 0.1)';
        $step4->animationDelay = '0.4s';
        $steps[] = $step4;

        return $steps;
    }
}
