<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class ServicesPage extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $builder = Builder::make('services_page');

        $builder
            ->addText('services_tagline', [
                'label' => 'Tagline',
                'default_value' => 'Full-Service HVAC Solutions',
            ])
            ->addText('services_hero_title', [
                'label' => 'Hero Title',
                'default_value' => 'COMPREHENSIVE HVAC SERVICES FOR YOUR HOME & BUSINESS',
            ])
            ->addTextarea('services_hero_desc', [
                'label' => 'Hero Description',
                'default_value' => 'From installations and repairs to maintenance and indoor air quality, Airflow delivers expert HVAC services to keep your home comfortable year-round.',
                'rows' => 3,
            ])
            ->addText('services_why_title', [
                'label' => 'Why Choose Us Title',
                'default_value' => 'WHY CHOOSE AIRFLOW?',
            ])
            ->addTextarea('services_why_desc', [
                'label' => 'Why Choose Us Description',
                'default_value' => 'Trusted by thousands of homeowners in Charlottesville for exceptional service and reliable comfort.',
                'rows' => 2,
            ])
            ->setLocation('page_template', '==', 'template-services.blade.php');

        return $builder->build();
    }
}
