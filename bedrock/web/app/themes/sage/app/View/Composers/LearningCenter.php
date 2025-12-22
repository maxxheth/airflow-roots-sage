<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class LearningCenter extends Composer
{
    protected static $views = ['template-learning-center'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('lc_badge') ?: 'Educational Resources',
            'title' => get_field('lc_hero_title') ?: 'HVAC LEARNING CENTER',
            'description' => get_field('lc_hero_desc') ?: 'Expert tips, maintenance guides, and educational content to help you get the most from your HVAC system.',
        ]);
    }
}
