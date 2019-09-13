<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title">{{ __('Nothing Found', THEME_TD) }}</h1>
    </header><!-- .page-header -->

    <div class="page-content">
        @if(is_home() && current_user_can('publish_posts'))
            {!! sprintf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', THEME_TD),
                    [
                        'a' => [
                            'href' => []
                        ]
                    ]
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            ) !!}
        @elseif (is_search())
            <p>{{ __('Sorry, but nothing matched your search terms. Please try again with some different keywords.', THEME_TD) }}</p>
            {!! get_search_form(['echo' => false]) !!}
        @else
            <p>{{ __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', THEME_TD) }}</p>
            {!! get_search_form(['echo' => false]) !!}
        @endif
    </div><!-- .page-content -->
</section><!-- .no-results -->
