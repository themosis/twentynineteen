<article id="post-{{ get_the_ID() }}" {!! post_class() !!}>
    @if(! twentynineteen_can_show_post_thumbnail())
        <header class="entry-header">
            @template('template-parts.header.entry', 'postheader')
        </header>
    @endif

    <div class="entry-content">
        {!! Loop::content() !!}
        {!! wp_link_pages([
            'before' => '<div class="page-links">' . __('Pages:', THEME_TD),
            'after' => '</div>',
        ]) !!}
    </div><!-- .entry-content -->

    @if(get_edit_post_link())
		<footer class="entry-footer">
			{!! edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', THEME_TD),
						[
							'span' => [
								'class' => [],
							],
						]
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			) !!}
		</footer><!-- .entry-footer -->
    @endif
</article><!-- #post-{{ get_the_ID() }} -->
