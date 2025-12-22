<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Maintenance extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('maintenance');
        $builder->setLocation('page_template', '==', 'template-maintenance.blade.php');

        $builder
            ->addText('maint_heading', ['label' => 'Main Heading', 'default_value' => 'OUR MAINTENANCE PROGRAM'])
            ->addText('maint_subheading', ['label' => 'Subheading', 'default_value' => 'Keep Your System Running Smoothly']);

        return $builder->build();
    }
}
