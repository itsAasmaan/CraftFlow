<?php

namespace App\Services\AbstractFactory;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class ThemeResolver
{
    /**
     * Get the current theme for the authenticated user's company.
     */
    public function getCurrentTheme(): string
    {
        return Auth::user()->company->theme ?? 'minimalist';
    }

    /**
     * Update the theme for the authenticated user's company.
     *
     * @param string $themeName
     */
    public function updateTheme(string $themeName): void
    {
        if (Auth::user()->company) {
            $company = Company::find(Auth::user()->company->id);
            $company->update(['theme' => $themeName]);
        }
    }

    /**
     * Get all available themes.
     *
     * @return array
     */
    public function getAvailableThemes(): array
    {
        return [
            'minimalist',
            'dark',
            'corporate',
        ];
    }
}