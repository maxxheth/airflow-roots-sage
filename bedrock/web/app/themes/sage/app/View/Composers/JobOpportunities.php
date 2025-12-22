<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class JobOpportunities extends Composer
{
    protected static $views = ['template-job-opportunities'];

    public function with(): array
    {
        return ['hero' => $this->getHero()];
    }

    protected function getHero(): object
    {
        return DTO::make([
            'badge' => get_field('jobs_badge') ?: 'Now Hiring',
            'title' => get_field('jobs_hero_title') ?: 'JOIN OUR TEAM',
            'description' => get_field('jobs_hero_desc') ?: 'We\'re always looking for talented, dedicated professionals to join our growing team.',
        ]);
    }
}
