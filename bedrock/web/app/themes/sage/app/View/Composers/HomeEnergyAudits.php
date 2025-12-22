<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class HomeEnergyAudits extends Composer
{
    protected static $views = ['template-home-energy-audits'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('hea_badge') ?: 'Reduce Energy Waste',
            'title' => get_field('hea_hero_title') ?: 'HOME ENERGY AUDITS',
            'subtitle' => get_field('hea_hero_subtitle') ?: 'Find Hidden Savings',
            'description' => get_field('hea_hero_desc') ?: 'Discover where your home is wasting energy and money.',
        ]);
    }
}
