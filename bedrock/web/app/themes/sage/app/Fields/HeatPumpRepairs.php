<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HeatPumpRepairs extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('heat_pump_repairs');
        $builder->setLocation('page_template', '==', 'template-heat-pump-repairs.blade.php');

        $builder
            ->addText('hprep_badge', ['label' => 'Badge', 'default_value' => 'Certified Heat Pump Experts'])
            ->addText('hprep_hero_title', ['label' => 'Hero Title', 'default_value' => 'HEAT PUMP REPAIRS'])
            ->addText('hprep_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Expert Service'])
            ->addTextarea('hprep_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
