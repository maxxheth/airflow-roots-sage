<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class GeothermalSystems extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('geothermal_systems');
        $builder->setLocation('page_template', '==', 'template-geothermal-systems.blade.php');

        $builder
            ->addText('geo_badge', ['label' => 'Badge', 'default_value' => 'Ultimate Energy Efficiency'])
            ->addText('geo_hero_title', ['label' => 'Hero Title', 'default_value' => 'GEOTHERMAL HVAC SYSTEMS'])
            ->addText('geo_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Earth-Powered Comfort'])
            ->addTextarea('geo_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
