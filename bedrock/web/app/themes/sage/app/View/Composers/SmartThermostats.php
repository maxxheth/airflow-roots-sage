<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class SmartThermostats extends Composer
{
    protected static $views = ['template-smart-thermostats'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('st_badge') ?: 'Control From Anywhere',
            'title' => get_field('st_hero_title') ?: 'SMART THERMOSTATS',
            'subtitle' => get_field('st_hero_subtitle') ?: 'Intelligent Comfort Control',
            'description' => get_field('st_hero_desc') ?: 'Upgrade to a smart thermostat and take control of your home\'s comfort and energy usage.',
        ]);
    }
}
