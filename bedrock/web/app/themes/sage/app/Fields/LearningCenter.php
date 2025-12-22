<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class LearningCenter extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('learning_center');
        $builder->setLocation('page_template', '==', 'template-learning-center.blade.php');

        $builder
            ->addText('lc_badge', ['label' => 'Badge', 'default_value' => 'Educational Resources'])
            ->addText('lc_hero_title', ['label' => 'Hero Title', 'default_value' => 'HVAC LEARNING CENTER'])
            ->addTextarea('lc_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
