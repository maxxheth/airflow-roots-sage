<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class HeatPumpInstallation extends Composer
{
    protected static $views = ['template-heat-pump-installation'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('hp_badge') ?: 'Energy-Efficient Solutions',
            'title' => get_field('hp_hero_title') ?: 'HEAT PUMP INSTALLATION',
            'subtitle' => get_field('hp_hero_subtitle') ?: 'Year-Round Comfort',
            'description' => get_field('hp_hero_desc') ?: 'Heat pumps provide both heating and cooling in a single, energy-efficient system.',
        ]);
    }
}
