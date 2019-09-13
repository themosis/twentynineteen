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
        View::share([
            'blogname' => get_bloginfo('name'),
            'blogdescription' => get_bloginfo('description', 'display')
        ]);

        View::composer([
            'layouts.main',
            'template-parts.header.entry-postheader'
        ], function ($view) {
            $discussion = !is_page() && twentynineteen_can_show_post_thumbnail()
                ? twentynineteen_get_discussion_data()
                : null;

            $classes = !empty($discussion) && absint($discussion->responses) > 0
                ? 'entry-header has-discussion'
                : 'entry-header';

            $view->with([
                'classes' => $classes,
                'discussion' => $discussion
            ]);
        });

        // Current Discussion on posts meta variables.
        View::composer('template-parts.post.discussion-commentmeta', function ($view) {
            $discussion = twentynineteen_get_discussion_data();

            if ($discussion->responses > 0) {
                // translators: %1(X comments)$s
                $meta_label = sprintf(
                    _n('%d Comment', '%d Comments', $discussion->responses, THEME_TD),
                    $discussion->responses
                );
            } else {
                $meta_label = __('No comments', THEME_TD);
            }

            $view->with([
                'discussion' => $discussion,
                'label' => $meta_label
            ]);
        });
    }
}
