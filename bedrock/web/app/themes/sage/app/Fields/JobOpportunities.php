<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class JobOpportunities extends Field
{
    public function fields(): array
    {
        $builder = Builder::make('job_opportunities');
        $builder->setLocation('page_template', '==', 'template-job-opportunities.blade.php');

        $builder
            ->addText('jobs_badge', ['label' => 'Badge', 'default_value' => 'Now Hiring'])
            ->addText('jobs_hero_title', ['label' => 'Hero Title', 'default_value' => 'JOIN OUR TEAM'])
            ->addTextarea('jobs_hero_desc', ['label' => 'Hero Description', 'rows' => 4]);

        return $builder->build();
    }
}
