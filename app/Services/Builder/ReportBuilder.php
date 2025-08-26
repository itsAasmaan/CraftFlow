<?php

namespace App\Services\Builder;

interface ReportBuilder
{
    public function setTitle(): void;

    public function setHeaders(): void;
    
    public function setRows(): void;
    
    public function getReport(): Report;
}
