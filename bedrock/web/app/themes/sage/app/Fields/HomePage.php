<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class HomePage extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $builder = Builder::make('home_page');

        $builder
            ->addText('hero_title', [
                'label' => 'Hero Title',
                'instructions' => 'Main headline for the hero section',
                'default_value' => 'YOUR TRUSTED PARTNER FOR HOME COMFORT IN CHARLOTTESVILLE',
            ])
            ->addTextarea('hero_description', [
                'label' => 'Hero Description',
                'instructions' => 'Subheadline text below the main hero title',
                'default_value' => 'Expert HVAC Repair, Installation, and Maintenance. Family-owned and operated, serving the Charlottesville community with certified technicians and guaranteed satisfaction.',
                'rows' => 3,
            ])
            ->addText('heating_title', [
                'label' => 'Heating Card Title',
                'default_value' => 'HEATING',
            ])
            ->addText('heating_description', [
                'label' => 'Heating Card Description',
                'default_value' => 'Furnace repair, installation, and maintenance to keep you warm all winter.',
            ])
            ->addText('cooling_card_title', [
                'label' => 'Cooling Card Title',
                'default_value' => 'COOLING',
            ])
            ->addText('cooling_card_description', [
                'label' => 'Cooling Card Description',
                'default_value' => 'AC repair, replacement, and tune-ups for optimal summer comfort.',
            ])
            ->addText('maintenance_card_title', [
                'label' => 'Maintenance Card Title',
                'default_value' => 'MAINTENANCE',
            ])
            ->addText('maintenance_card_description', [
                'label' => 'Maintenance Card Description',
                'default_value' => 'Preventive maintenance plans to extend system life and efficiency.',
            ])
            ->addText('geothermal_card_title', [
                'label' => 'Geothermal Card Title',
                'default_value' => 'GEOTHERMAL',
            ])
            ->addText('geothermal_card_description', [
                'label' => 'Geothermal Card Description',
                'default_value' => 'Eco-friendly geothermal systems for efficient heating and cooling.',
            ])
            ->setLocation('page_template', '==', 'template-home.blade.php')
            ->or('page_type', '==', 'front_page');

        return $builder->build();
    }
}
