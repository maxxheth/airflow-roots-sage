<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class AcInstallation extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $builder = Builder::make('ac_installation');

        $builder
            ->setLocation('page_template', '==', 'template-ac-installation.blade.php');

        $builder
            ->addText('ac_trust_badge', [
                'label' => 'Trust Badge',
                'instructions' => 'Badge text shown in hero section',
                'default_value' => '35+ Years of Trusted Service',
            ])
            ->addText('ac_hero_title', [
                'label' => 'Hero Title',
                'instructions' => 'Main headline for the hero section',
                'default_value' => 'EXPERT AIR CONDITIONING INSTALLATION',
            ])
            ->addText('ac_hero_subtitle', [
                'label' => 'Hero Subtitle',
                'instructions' => 'Subtitle below the main title',
                'default_value' => 'Near Charlottesville, VA',
            ])
            ->addTextarea('ac_hero_desc', [
                'label' => 'Hero Description',
                'instructions' => 'Description text in hero section',
                'default_value' => 'When it\'s time to upgrade or replace your air conditioning system, trust the experts at Air Flow Systems. Our team of experienced technicians provides professional AC installation services that ensure your home stays cool and comfortable for years to come.',
                'rows' => 4,
            ])
            ->addText('ac_badge_text', [
                'label' => 'Badge Text',
                'instructions' => '24/7 badge text below CTAs',
                'default_value' => 'Professional Installation & Free Estimates Available',
            ])
            ->addText('ac_needs_title', [
                'label' => 'Needs Section Title',
                'instructions' => 'Title for "Is it time for new AC" section',
                'default_value' => 'IS IT TIME FOR A NEW A/C SYSTEM?',
            ])
            ->addTextarea('ac_needs_desc', [
                'label' => 'Needs Section Description',
                'instructions' => 'Description for needs section',
                'default_value' => 'If your air conditioning system is aging, frequently breaking down, or not cooling efficiently, it may be time to consider a new installation. A new AC system can improve your home\'s comfort, reduce energy costs, and provide peace of mind with reliable performance.',
                'rows' => 3,
            ])
            ->addText('ac_signs_title', [
                'label' => 'Signs Title',
                'instructions' => 'Title for signs grid section',
                'default_value' => 'Signs You Need a New AC System',
            ]);

        return $builder->build();
    }
}
