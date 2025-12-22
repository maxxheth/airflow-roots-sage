<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HvacServices extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('hvac_services');
        $builder->setLocation('page_template', '==', 'template-hvac-services.blade.php');

        $builder
            ->addText('hvac_badge', ['label' => 'Badge', 'default_value' => 'Complete HVAC Solutions'])
            ->addText('hvac_hero_title', ['label' => 'Hero Title', 'default_value' => 'FULL-SERVICE HVAC'])
            ->addText('hvac_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Your Comfort Experts'])
            ->addTextarea('hvac_hero_desc', ['label' => 'Hero Description', 'rows' => 4])
            ->addText('hvac_services_title', ['label' => 'Services Section Title', 'default_value' => 'OUR SERVICES']);

        return $builder->build();
    }
}
