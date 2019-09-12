<?php

namespace Theme\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Controller namespace for theme routes.
     *
     * @var string
     */
    protected $namespace = 'Theme\Controllers';

    public function boot()
    {
        parent::boot();
    }

    /**
     * Load theme routes.
     */
    public function map()
    {
        /* @var ThemeManager $theme */
        $theme = app('wp.theme');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(themes_path($theme->getDirectory().'/routes.php'));
    }
}