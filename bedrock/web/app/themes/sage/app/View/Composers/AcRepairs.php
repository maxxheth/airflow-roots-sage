<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class AcRepairs extends Composer
{
    protected static $views = ['template-ac-repairs'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('acrepair_badge') ?: '24/7 Emergency Service',
            'title' => get_field('acrepair_hero_title') ?: 'FAST AC REPAIRS',
            'subtitle' => get_field('acrepair_hero_subtitle') ?: 'When You Need It Most',
            'description' => get_field('acrepair_hero_desc') ?: 'When your AC breaks down in the middle of summer, you need reliable repair service fast.',
        ]);
    }
}
