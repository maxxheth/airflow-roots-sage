<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Faq extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('faq');
        $builder->setLocation('page_template', '==', 'template-faq.blade.php');

        $builder
            ->addText('faq_heading', ['label' => 'Heading', 'default_value' => 'FREQUENTLY ASKED QUESTIONS'])
            ->addTextarea('faq_subheading', ['label' => 'Subheading', 'rows' => 3]);

        return $builder->build();
    }
}
