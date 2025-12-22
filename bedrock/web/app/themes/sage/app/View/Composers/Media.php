<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class Media extends Composer
{
    protected static $views = ['template-media'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('media_badge') ?: 'Our Work & Credentials',
            'title' => get_field('media_hero_title') ?: 'MEDIA & GALLERY',
            'description' => get_field('media_hero_desc') ?: 'See our quality workmanship, certifications, and the trusted brands we install and service.',
        ]);
    }
}
