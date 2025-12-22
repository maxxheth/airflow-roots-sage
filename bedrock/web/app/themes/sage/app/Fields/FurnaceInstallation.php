<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class FurnaceInstallation extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('furnace_installation');
        $builder->setLocation('page_template', '==', 'template-furnace-installation.blade.php');

        $builder
            ->addText('furnace_trust_badge', ['label' => 'Trust Badge', 'default_value' => '35+ Years of Trusted Service'])
            ->addText('furnace_hero_title', ['label' => 'Hero Title', 'default_value' => 'BEST FURNACE INSTALLATIONS'])
            ->addText('furnace_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'in Charlottesville, VA'])
            ->addTextarea('furnace_hero_desc', ['label' => 'Hero Description', 'rows' => 4])
            ->addText('furnace_badge_text', ['label' => 'Badge Text', 'default_value' => 'Professional Installation & Free Estimates Available']);

        return $builder->build();
    }
}
