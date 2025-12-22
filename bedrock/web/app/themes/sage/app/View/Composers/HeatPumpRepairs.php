<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class HeatPumpRepairs extends Composer
{
    protected static $views = ['template-heat-pump-repairs'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('hprep_badge') ?: 'Certified Heat Pump Experts',
            'title' => get_field('hprep_hero_title') ?: 'HEAT PUMP REPAIRS',
            'subtitle' => get_field('hprep_hero_subtitle') ?: 'Expert Service',
            'description' => get_field('hprep_hero_desc') ?: 'Heat pumps provide both heating and cooling, so when they fail, you need expert repair service fast.',
        ]);
    }
}
