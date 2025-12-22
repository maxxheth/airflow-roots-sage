<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class AcRepairs extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('ac_repairs');
        $builder->setLocation('page_template', '==', 'template-ac-repairs.blade.php');

        $builder
            ->addText('acrepair_badge', ['label' => 'Badge', 'default_value' => '24/7 Emergency Service'])
            ->addText('acrepair_hero_title', ['label' => 'Hero Title', 'default_value' => 'FAST AC REPAIRS'])
            ->addText('acrepair_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'When You Need It Most'])
            ->addTextarea('acrepair_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
