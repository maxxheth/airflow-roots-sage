<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class SmartThermostats extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('smart_thermostats');
        $builder->setLocation('page_template', '==', 'template-smart-thermostats.blade.php');

        $builder
            ->addText('st_badge', ['label' => 'Badge', 'default_value' => 'Control From Anywhere'])
            ->addText('st_hero_title', ['label' => 'Hero Title', 'default_value' => 'SMART THERMOSTATS'])
            ->addText('st_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Intelligent Comfort Control'])
            ->addTextarea('st_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
