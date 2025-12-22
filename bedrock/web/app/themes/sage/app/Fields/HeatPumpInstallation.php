<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HeatPumpInstallation extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('heat_pump_installation');
        $builder->setLocation('page_template', '==', 'template-heat-pump-installation.blade.php');

        $builder
            ->addText('hp_badge', ['label' => 'Badge', 'default_value' => 'Energy-Efficient Solutions'])
            ->addText('hp_hero_title', ['label' => 'Hero Title', 'default_value' => 'HEAT PUMP INSTALLATION'])
            ->addText('hp_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Year-Round Comfort'])
            ->addTextarea('hp_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
