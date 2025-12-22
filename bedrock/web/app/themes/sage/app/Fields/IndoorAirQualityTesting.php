<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class IndoorAirQualityTesting extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('indoor_air_quality_testing');
        $builder->setLocation('page_template', '==', 'template-indoor-air-quality-testing.blade.php');

        $builder
            ->addText('air_badge', ['label' => 'Badge', 'default_value' => 'Breathe Easier At Home'])
            ->addText('air_hero_title', ['label' => 'Hero Title', 'default_value' => 'INDOOR AIR QUALITY'])
            ->addText('air_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Testing & Solutions'])
            ->addTextarea('air_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
