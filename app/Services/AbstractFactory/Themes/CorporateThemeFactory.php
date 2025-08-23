<?php

namespace App\Services\AbstractFactory\Themes;

use App\Services\AbstractFactory\Contracts\ThemeFactory;
use Illuminate\View\View;

class CorporateThemeFactory implements ThemeFactory
{
    public function createButton(string $buttonContent): View
    {
        return view('components.themes.corporate.button', ['content' => $buttonContent]);
    }

    public function createSecondaryButton(string $buttonContent): View
    {
        return view('components.themes.corporate.secondary-button', ['content' => $buttonContent]);
    }

    public function createNavbar(): View
    {
        return view('components.themes.corporate.navbar');
    }

    public function createHeader(string $headerContent): View
    {
        return view('components.themes.corporate.header', ['headerContent' => $headerContent]);
    }

    public function createFooter(): View
    {
        return view('components.themes.corporate.footer');
    }

    public function createDashboard(): View
    {
        return view('components.themes.corporate.dashboard');
    }
}