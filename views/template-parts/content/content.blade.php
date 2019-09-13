<article id="post-{{ get_the_ID() }}" {!! post_class() !!}>
    <header class="entry-header">
        @if(is_sticky() && is_home() && ! is_paged())
            {!! sprintf('<span class="sticky-post">%s</span>', _x('Featured', 'post', THEME_TD)) !!}
        @endif
        @if(is_singular())
            {!! the_title('<h1 class="entry-title">', '</h1>', false) !!}
        @else
            {!! the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>', false) !!}
        @endif
    </header><!-- .entry-header -->

    @php(twentynineteen_post_thumbnail())

    <div class="entry-content">
        {!! Loop::content(
            sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', THEME_TD),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                get_the_title()
            )
        ) !!}
        {!! wp_link_pages([
            'before' => '<div class="page-links">' . __('Pages:', THEME_TD),
            'after' => '</div>',
        ]) !!}
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        @php(twentynineteen_entry_footer())
    </footer><!-- .entry-footer -->
</article><!-- #post-{{ get_the_ID() }} -->
