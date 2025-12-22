<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class IndoorAirQualityTesting extends Composer
{
    protected static $views = ['template-indoor-air-quality-testing'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('air_badge') ?: 'Breathe Easier At Home',
            'title' => get_field('air_hero_title') ?: 'INDOOR AIR QUALITY',
            'subtitle' => get_field('air_hero_subtitle') ?: 'Testing & Solutions',
            'description' => get_field('air_hero_desc') ?: 'Indoor air can be 2-5 times more polluted than outdoor air.',
        ]);
    }
}
