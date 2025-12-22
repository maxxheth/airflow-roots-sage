<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Media extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('media');
        $builder->setLocation('page_template', '==', 'template-media.blade.php');

        $builder
            ->addText('media_badge', ['label' => 'Badge', 'default_value' => 'Our Work & Credentials'])
            ->addText('media_hero_title', ['label' => 'Hero Title', 'default_value' => 'MEDIA & GALLERY'])
            ->addTextarea('media_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
