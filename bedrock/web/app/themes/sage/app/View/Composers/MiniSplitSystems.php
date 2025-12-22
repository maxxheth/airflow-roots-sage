<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class MiniSplitSystems extends Composer
{
    protected static $views = ['template-mini-split-systems'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('ms_badge') ?: 'Flexible Zoned Comfort',
            'title' => get_field('ms_hero_title') ?: 'DUCTLESS MINI-SPLIT SYSTEMS',
            'subtitle' => get_field('ms_hero_subtitle') ?: 'No Ducts Required',
            'description' => get_field('ms_hero_desc') ?: 'Perfect for room additions, older homes without ductwork, or creating custom climate zones.',
        ]);
    }
}
