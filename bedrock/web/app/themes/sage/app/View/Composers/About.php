<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use stdClass;

class About extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array<int, string>
     */
    protected static $views = [
        'template-about',
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
            'mission' => $this->getMission(),
            'values' => $this->getValues(),
            'community' => $this->getCommunity(),
            'timeline' => $this->getTimeline(),
        ];
    }

    /**
     * Get hero section data.
     */
    protected function getHero(): stdClass
    {
        $hero = new stdClass();
        $hero->title = get_field('about_hero_title') ?: 'OUR STORY: A FAMILY DEDICATED TO YOUR COMFORT';
        $hero->intro = get_field('about_hero_intro') ?: 'Since 1988, Airflow Heating & Air has been more than just an HVAC company—we\'re your neighbors, your friends, and a family committed to keeping Charlottesville homes comfortable year-round.';
        $hero->description = get_field('about_hero_description') ?: 'What started as a small family business has grown into a trusted name in the community, but our values remain the same: integrity, quality workmanship, and treating every customer like family.';
        
        return $hero;
    }

    /**
     * Get mission section data.
     */
    protected function getMission(): stdClass
    {
        $mission = new stdClass();
        $mission->title = get_field('about_mission_title') ?: 'About Us';
        $mission->paragraphs = [
            get_field('about_mission_paragraph_1') ?: 'For over three decades, Airflow Heating & Air has been the trusted name in HVAC services for Charlottesville and the surrounding communities. Founded by John Artmay in 1988, our company has always been built on the principles of honesty, quality craftsmanship, and treating every customer like family.',
            get_field('about_mission_paragraph_2') ?: 'As a locally owned and operated business, we understand the unique climate challenges of Central Virginia. From sweltering summers to freezing winters, we\'ve seen it all—and we know exactly how to keep your home comfortable year-round.',
            get_field('about_mission_paragraph_3') ?: 'Today, our team of NATE-certified technicians continues to uphold the same high standards that John established decades ago. Whether it\'s an emergency repair at 2 AM or a routine maintenance check, we treat every job with the same care and attention to detail.',
        ];
        
        return $mission;
    }

    /**
     * Get values section data.
     */
    protected function getValues(): stdClass
    {
        $valuesSection = new stdClass();
        $valuesSection->title = get_field('about_values_title') ?: 'OUR MISSION & VALUES';
        $valuesSection->description = get_field('about_values_description') ?: 'Our mission is simple: to provide exceptional HVAC services that keep your family comfortable while building lasting relationships based on trust and excellence.';
        
        // Static values data
        $valuesSection->items = \App\Support\DTO::collection([
            [
                'title' => 'INTEGRITY',
                'icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="m9 12 2 2 4-4"></path>',
                'color' => '#003976',
                'bgColor' => 'rgba(0, 57, 118, 0.1)',
                'description' => 'We do what\'s right for our customers, every time. Honest assessments, fair pricing, and transparent communication are at the heart of everything we do.',
            ],
            [
                'title' => 'QUALITY',
                'icon' => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>',
                'color' => '#14A850',
                'bgColor' => 'rgba(20, 168, 80, 0.1)',
                'description' => 'Our NATE-certified technicians are trained to the highest standards. We use premium equipment and proven techniques to deliver superior results.',
            ],
            [
                'title' => 'CUSTOMER SATISFACTION',
                'icon' => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>',
                'color' => '#44A7DE',
                'bgColor' => 'rgba(68, 167, 222, 0.1)',
                'description' => 'Your comfort and peace of mind are our top priorities. We\'re not satisfied until you\'re completely happy with our work.',
            ],
        ]);
        
        return $valuesSection;
    }

    /**
     * Get community section data.
     */
    protected function getCommunity(): stdClass
    {
        $community = new stdClass();
        $community->title = get_field('about_community_title') ?: 'COMMUNITY COMMITMENT';
        $community->description = get_field('about_community_description') ?: 'Giving back to the Charlottesville community is at the heart of what we do.';
        
        // Static community photos
        $community->photos = \App\Support\DTO::collection([
            [
                'title' => 'Youth Sports Sponsor',
                'subtitle' => 'Supporting local youth athletics for over 20 years',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&q=80',
            ],
            [
                'title' => 'Habitat for Humanity',
                'subtitle' => 'Installing HVAC systems for families in need',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&q=80',
            ],
            [
                'title' => 'Community Events',
                'subtitle' => 'Active participants in local festivals and fundraisers',
                'image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=600&q=80',
            ],
        ]);
        
        return $community;
    }

    /**
     * Get timeline section data.
     */
    protected function getTimeline(): stdClass
    {
        $timeline = new stdClass();
        $timeline->title = get_field('about_timeline_title') ?: 'OUR JOURNEY SINCE 1988';
        $timeline->description = get_field('about_timeline_description') ?: 'Three decades of serving Charlottesville with excellence, integrity, and dedication.';
        
        // Static timeline items
        $timeline->items = \App\Support\DTO::collection([
            [
                'year' => '1988',
                'color' => '#003976',
                'title' => 'Company Founded',
                'description' => 'John Artmay starts Airflow Heating & Air with a single truck and a commitment to honest service.',
                'hasLine' => true,
            ],
            [
                'year' => '1995',
                'color' => '#14A850',
                'title' => 'Team Expansion',
                'description' => 'Growing demand leads to hiring our first team of certified technicians and expanding service capacity.',
                'hasLine' => true,
            ],
            [
                'year' => '2005',
                'color' => '#44A7DE',
                'title' => 'NATE Certification',
                'description' => 'All technicians achieve NATE certification, setting new standards for quality and expertise.',
                'hasLine' => true,
            ],
            [
                'year' => '2015',
                'color' => '#003976',
                'title' => 'Geothermal Pioneer',
                'description' => 'Become one of the first in the area to specialize in eco-friendly geothermal heating and cooling systems.',
                'hasLine' => true,
            ],
            [
                'year' => '2025',
                'color' => '#14A850',
                'title' => 'Serving 5,000+ Customers',
                'description' => 'Proud to serve over 5,000 satisfied customers across Charlottesville and surrounding areas, with 24/7 emergency service.',
                'hasLine' => false,
            ],
        ]);
        
        return $timeline;
    }
}
