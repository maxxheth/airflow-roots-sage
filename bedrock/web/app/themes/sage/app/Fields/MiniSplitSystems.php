<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class MiniSplitSystems extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('mini_split_systems');
        $builder->setLocation('page_template', '==', 'template-mini-split-systems.blade.php');

        $builder
            ->addText('ms_badge', ['label' => 'Badge', 'default_value' => 'Flexible Zoned Comfort'])
            ->addText('ms_hero_title', ['label' => 'Hero Title', 'default_value' => 'DUCTLESS MINI-SPLIT SYSTEMS'])
            ->addText('ms_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'No Ducts Required'])
            ->addTextarea('ms_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
