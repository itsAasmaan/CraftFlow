<?php

namespace App\Services\AbstractFactory\Themes;

use App\Services\AbstractFactory\Contracts\ThemeFactory;
use Illuminate\View\View;

class DarkThemeFactory implements ThemeFactory
{
    public function createButton(string $buttonContent): View
    {
        return view('components.themes.dark.button', ['content' => $buttonContent]);
    }

    public function createSecondaryButton(string $buttonContent): View
    {
        return view('components.themes.dark.secondary-button', ['content' => $buttonContent]);
    }

    public function createNavbar(): View
    {
        return view('components.themes.dark.navbar');
    }

    public function createHeader(string $headerContent): View
    {
        return view('components.themes.dark.header', ['headerContent' => $headerContent]);
    }

    public function createFooter(): View
    {
        return view('components.themes.dark.footer');
    }

    public function createDashboard(): View
    {
        return view('components.themes.dark.dashboard');
    }
}