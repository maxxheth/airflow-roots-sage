<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class HvacServices extends Composer
{
    protected static $views = ['template-hvac-services'];

    public function with(): array
    {
        return [
            'hero' => $this->getHero(),
            'servicesTitle' => get_field('hvac_services_title') ?: 'OUR SERVICES',
        ];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('hvac_badge') ?: 'Complete HVAC Solutions',
            'title' => get_field('hvac_hero_title') ?: 'FULL-SERVICE HVAC',
            'subtitle' => get_field('hvac_hero_subtitle') ?: 'Your Comfort Experts',
            'description' => get_field('hvac_hero_desc') ?: 'From installation to repair and maintenance, we handle all your heating and cooling needs.',
        ]);
    }
}
