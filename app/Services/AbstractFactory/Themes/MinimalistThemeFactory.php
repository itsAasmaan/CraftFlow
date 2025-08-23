<?php

namespace App\Services\AbstractFactory\Themes;

use App\Services\AbstractFactory\Contracts\ThemeFactory;
use Illuminate\View\View;

class MinimalistThemeFactory implements ThemeFactory
{
    public function createButton(string $buttonContent): View
    {
        return view('components.themes.minimalist.button', ['content' => $buttonContent]);
    }

    public function createSecondaryButton(string $buttonContent): View
    {
        return view('components.themes.minimalist.secondary-button', ['content' => $buttonContent]);
    }

    public function createNavbar(): View
    {
        return view('components.themes.minimalist.navbar');
    }

    public function createHeader(string $headerContent): View
    {
        return view('components.themes.minimalist.header', ['headerContent' => $headerContent]);
    }

    public function createFooter(): View
    {
        return view('components.themes.minimalist.footer');
    }

    public function createDashboard(): View
    {
        return view('components.themes.minimalist.dashboard');
    }
}
