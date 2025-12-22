<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class FurnaceRepair extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('furnace_repair');
        $builder->setLocation('page_template', '==', 'template-furnace-repair.blade.php');

        $builder
            ->addText('furnacerepair_badge', ['label' => 'Badge', 'default_value' => 'Emergency Furnace Repairs'])
            ->addText('furnacerepair_hero_title', ['label' => 'Hero Title', 'default_value' => 'FURNACE REPAIR SERVICES'])
            ->addText('furnacerepair_hero_subtitle', ['label' => 'Hero Subtitle', 'default_value' => 'Fast & Reliable'])
            ->addTextarea('furnacerepair_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
