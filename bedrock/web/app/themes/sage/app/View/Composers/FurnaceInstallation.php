<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class FurnaceInstallation extends Composer
{
    protected static $views = ['template-furnace-installation'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'trustBadge' => get_field('furnace_trust_badge') ?: '35+ Years of Trusted Service',
            'title' => get_field('furnace_hero_title') ?: 'BEST FURNACE INSTALLATIONS',
            'subtitle' => get_field('furnace_hero_subtitle') ?: 'in Charlottesville, VA',
            'description' => get_field('furnace_hero_desc') ?: 'When it comes to keeping your home warm and comfortable during the chilly months in Charlottesville, VA, trust Air Flow Systems.',
            'badgeText' => get_field('furnace_badge_text') ?: 'Professional Installation & Free Estimates Available',
        ]);
    }
}
