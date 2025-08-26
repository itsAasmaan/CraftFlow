<?php

namespace App\Services\Builder;

class ReportDirector
{
    private ReportBuilder $builder;

    public function __construct(ReportBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function build(): Report
    {
        $this->builder->setTitle();
        $this->builder->setHeaders();
        $this->builder->setRows();
        
        return $this->builder->getReport();
    }
}
