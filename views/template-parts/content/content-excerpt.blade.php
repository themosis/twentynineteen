<article id="post-{{ get_the_ID() }}" {!! post_class() !!}>
    <header class="entry-header">
        @if(is_sticky() && is_home() && ! is_paged())
            {!! sprintf('<span class="sticky-post">%s</span>', _x('Featured', 'post', THEME_TD)) !!}
        @endif
        {!! the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>', false) !!}
    </header><!-- .entry-header -->

    @php(twentynineteen_post_thumbnail())

    <div class="entry-content">
        {!! Loop::excerpt() !!}
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        @php(twentynineteen_entry_footer())
    </footer><!-- .entry-footer -->
</article><!-- #post-{{ get_the_ID() }} -->