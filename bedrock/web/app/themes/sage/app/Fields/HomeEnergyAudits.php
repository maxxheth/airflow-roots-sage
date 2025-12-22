<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HomeEnergyAudits extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('home_energy_audits');
        $builder->setLocation('page_template', '==', 'template-home-energy-audits.blade.php');

        $builder
            ->addText('hea_badge', ['label' => 'Badge', 'default_value' => 'Reduce Energy Waste'])
            ->addText('hea_hero_title', ['label' => 'Hero Title', 'default_value' => 'HOME ENERGY AUDITS'])
            ->addText('hea_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Find Hidden Savings'])
            ->addTextarea('hea_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
