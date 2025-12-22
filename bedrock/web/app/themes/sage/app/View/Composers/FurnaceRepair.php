<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class FurnaceRepair extends Composer
{
    protected static $views = ['template-furnace-repair'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('furnacerepair_badge') ?: 'Emergency Furnace Repairs',
            'title' => get_field('furnacerepair_hero_title') ?: 'FURNACE REPAIR SERVICES',
            'subtitle' => get_field('furnacerepair_hero_subtitle') ?: 'Fast & Reliable',
            'description' => get_field('furnacerepair_hero_desc') ?: 'Don\'t let a broken furnace leave you in the cold.',
        ]);
    }
}
