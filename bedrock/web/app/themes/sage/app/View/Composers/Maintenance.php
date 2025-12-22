<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class Maintenance extends Composer
{
    protected static $views = ['template-maintenance'];

    public function with(): array
    {
        return [
            'heading' => get_field('maint_heading') ?: 'OUR MAINTENANCE PROGRAM',
            'subheading' => get_field('maint_subheading') ?: 'Keep Your System Running Smoothly',
        ];
    }
}
