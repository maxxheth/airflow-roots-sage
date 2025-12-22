<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class GeothermalSystems extends Composer
{
    protected static $views = ['template-geothermal-systems'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('geo_badge') ?: 'Ultimate Energy Efficiency',
            'title' => get_field('geo_hero_title') ?: 'GEOTHERMAL HVAC SYSTEMS',
            'subtitle' => get_field('geo_hero_subtitle') ?: 'Earth-Powered Comfort',
            'description' => get_field('geo_hero_desc') ?: 'Harness the earth\'s constant underground temperature for ultra-efficient heating and cooling.',
        ]);
    }
}
