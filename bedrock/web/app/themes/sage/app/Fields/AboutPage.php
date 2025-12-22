<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class AboutPage extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $builder = Builder::make('about_page');

        $builder
            ->addText('about_hero_title', [
                'label' => 'Hero Title',
                'default_value' => 'OUR STORY: A FAMILY DEDICATED TO YOUR COMFORT',
            ])
            ->addTextarea('about_hero_intro', [
                'label' => 'Hero Intro',
                'default_value' => 'Since 1988, Airflow Heating & Air has been more than just an HVAC company—we\'re your neighbors, your friends, and a family committed to keeping Charlottesville homes comfortable year-round.',
                'rows' => 3,
            ])
            ->addTextarea('about_hero_description', [
                'label' => 'Hero Description',
                'default_value' => 'What started as a small family business has grown into a trusted name in the community, but our values remain the same: integrity, quality workmanship, and treating every customer like family.',
                'rows' => 3,
            ])
            ->addText('about_mission_title', [
                'label' => 'Mission Section Title',
                'default_value' => 'About Us',
            ])
            ->addTextarea('about_mission_paragraph_1', [
                'label' => 'Mission Paragraph 1',
                'default_value' => 'For over three decades, Airflow Heating & Air has been the trusted name in HVAC services for Charlottesville and the surrounding communities. Founded by John Artmay in 1988, our company has always been built on the principles of honesty, quality craftsmanship, and treating every customer like family.',
                'rows' => 4,
            ])
            ->addTextarea('about_mission_paragraph_2', [
                'label' => 'Mission Paragraph 2',
                'default_value' => 'As a locally owned and operated business, we understand the unique climate challenges of Central Virginia. From sweltering summers to freezing winters, we\'ve seen it all—and we know exactly how to keep your home comfortable year-round.',
                'rows' => 4,
            ])
            ->addTextarea('about_mission_paragraph_3', [
                'label' => 'Mission Paragraph 3',
                'default_value' => 'Today, our team of NATE-certified technicians continues to uphold the same high standards that John established decades ago. Whether it\'s an emergency repair at 2 AM or a routine maintenance check, we treat every job with the same care and attention to detail.',
                'rows' => 4,
            ])
            ->addText('about_values_title', [
                'label' => 'Values Section Title',
                'default_value' => 'OUR MISSION & VALUES',
            ])
            ->addTextarea('about_values_description', [
                'label' => 'Values Section Description',
                'default_value' => 'Our mission is simple: to provide exceptional HVAC services that keep your family comfortable while building lasting relationships based on trust and excellence.',
                'rows' => 2,
            ])
            ->addText('about_community_title', [
                'label' => 'Community Section Title',
                'default_value' => 'COMMUNITY COMMITMENT',
            ])
            ->addText('about_community_description', [
                'label' => 'Community Section Description',
                'default_value' => 'Giving back to the Charlottesville community is at the heart of what we do.',
            ])
            ->addText('about_timeline_title', [
                'label' => 'Timeline Section Title',
                'default_value' => 'OUR JOURNEY SINCE 1988',
            ])
            ->addText('about_timeline_description', [
                'label' => 'Timeline Section Description',
                'default_value' => 'Three decades of serving Charlottesville with excellence, integrity, and dedication.',
            ])
            ->setLocation('page_template', '==', 'template-about.blade.php');

        return $builder->build();
    }
}
