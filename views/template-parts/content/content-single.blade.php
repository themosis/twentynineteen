<article id="post-{{ get_the_ID() }}" {!! post_class() !!}>
    @if(! twentynineteen_can_show_post_thumbnail())
        <header class="entry-header">
            @template('template-parts.header.entry', 'postheader')
        </header>
    @endif

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

    @if(!is_singular('attachment'))
		@template('template-parts.post.author', 'bio')
	@endif

</article><!-- #post-{{ get_the_ID() }} -->
