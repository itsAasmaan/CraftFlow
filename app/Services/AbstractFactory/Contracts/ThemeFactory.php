<?php

namespace App\Services\AbstractFactory\Contracts;

use Illuminate\View\View;

interface ThemeFactory
{
    public function createButton(string $buttonContent): View;

    public function createSecondaryButton(string $buttonContent): View;

    public function createNavbar(): View;
    
    public function createHeader(string $headerContent): View;
    
    public function createFooter(): View;
    
    public function createDashboard(): View;
}