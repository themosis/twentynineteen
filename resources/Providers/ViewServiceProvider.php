<?php

namespace Theme\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Share data to theme views.
     */
    public function boot()
    {
        View::share('blogname', get_bloginfo('name'));

        View::composer('layouts.main', function ($view) {
            twentynineteen_post_thumbnail();
            the_post();

            $discussion = ! is_page() && twentynineteen_can_show_post_thumbnail()
                ? twentynineteen_get_discussion_data()
                : null;

            $classes = ! empty($discussion) && absint($discussion->responses) > 0
                ? 'entry-header has-discussion'
                : 'entry-header';

            $view->with('classes', $classes);
        });
    }
}
