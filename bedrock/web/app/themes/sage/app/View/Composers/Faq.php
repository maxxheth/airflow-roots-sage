<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App\Support\DTO;

class Faq extends Composer
{
    protected static $views = ['template-faq'];

    public function with(): array
    {
        return [
            'heading' => get_field('faq_heading') ?: 'FREQUENTLY ASKED QUESTIONS',
            'subheading' => get_field('faq_subheading') ?: 'Find answers to common questions about HVAC systems, maintenance, and our services.',
        ];
    }
}
