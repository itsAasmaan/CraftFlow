<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AbstractFactory\ThemeResolver;

class ThemeController extends Controller
{
    public function __construct(private ThemeResolver $themeResolver) {}

    public function index()
    {
        return view('settings.theme', [
            'currentTheme' => $this->themeResolver->getCurrentTheme(),
            'availableThemes' => $this->themeResolver->getAvailableThemes(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:' . implode(',', $this->themeResolver->getAvailableThemes()),
        ]);

        $this->themeResolver->updateTheme($request->input('theme'));

        return back()->with('status', 'Theme updated successfully!');
    }
}