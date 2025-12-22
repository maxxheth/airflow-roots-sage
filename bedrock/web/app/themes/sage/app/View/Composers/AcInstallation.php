<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class AcInstallation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-ac-installation',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'hero' => $this->getHero(),
            'needs' => $this->getNeeds(),
        ];
    }

    /**
     * Get hero section data
     */
    protected function getHero(): object
    {
        return DTO::make([
            'trustBadge' => get_field('ac_trust_badge') ?: '35+ Years of Trusted Service',
            'title' => get_field('ac_hero_title') ?: 'EXPERT AIR CONDITIONING INSTALLATION',
            'subtitle' => get_field('ac_hero_subtitle') ?: 'Near Charlottesville, VA',
            'description' => get_field('ac_hero_desc') ?: 'When it\'s time to upgrade or replace your air conditioning system, trust the experts at Air Flow Systems.',
            'badgeText' => get_field('ac_badge_text') ?: 'Professional Installation & Free Estimates Available',
        ]);
    }

    /**
     * Get needs section data
     */
    protected function getNeeds(): object
    {
        return DTO::make([
            'title' => get_field('ac_needs_title') ?: 'IS IT TIME FOR A NEW A/C SYSTEM?',
            'description' => get_field('ac_needs_desc') ?: 'If your air conditioning system is aging, frequently breaking down, or not cooling efficiently, it may be time to consider a new installation.',
            'signsTitle' => get_field('ac_signs_title') ?: 'Signs You Need a New AC System',
        ]);
    }
}
