<?php

namespace App\Providers;

use App\Services\AbstractFactory\Themes\DarkThemeFactory;
use App\Services\AbstractFactory\Themes\MinimalistThemeFactory;
use App\Services\AbstractFactory\Themes\CorporateThemeFactory;
use App\Services\AbstractFactory\Contracts\ThemeFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ThemeFactory::class, function ($app) {
            $user = auth()->user();
            $companyTheme = $user->company->theme ?? 'minimalist';

            return match ($companyTheme) {
                'dark' => new DarkThemeFactory(),
                'corporate' => new CorporateThemeFactory(),
                default => new MinimalistThemeFactory(),
            };
        });
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('themeFactory', app(ThemeFactory::class));
        });
    }
}