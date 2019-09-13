<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Theme Assets
     *
     * Here we define the loaded assets from our previously defined
     * "dist" directory. Assets sources are located under the root "assets"
     * directory and are then compiled, thanks to Laravel Mix, to the "dist"
     * folder.
     *
     * @see https://laravel-mix.com/
     */
    public function register()
    {
        /** @var ThemeManager $theme */
        $theme = $this->app->make('wp.theme');

        Asset::add('twentynineteen-style', 'css/style.css', [], $theme->getHeader('version'), 'screen')->to();
        wp_style_add_data('twentynineteen-style', 'rtl', 'replace');

        if (has_nav_menu('menu-1')) {
            Asset::add('twentynineteen-priority-menu', '/js/priority-menu.js', [], '1.1', true);
            Asset::add('twentynineteen-touch-navigation', '/js/touch-keyboard-navigation.js', [], '1.1', true);
        }

        Asset::add('twentynineteen-print-style', 'css/print.css', [], $theme->getHeader('version'), 'print')->to();

        Action::add('wp_enqueue_scripts', function () {
            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
        });
    }
}
