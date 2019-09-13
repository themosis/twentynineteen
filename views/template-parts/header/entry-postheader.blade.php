{!! the_title('<h1 class="entry-title">', '</h1>', false) !!}

@if(! is_page())
    <div class="entry-meta">
        {!! twentynineteen_posted_by() !!}
        {!! twentynineteen_posted_on() !!}

        <span class="comment-count">
			@if(! empty($discussion))
                {!! twentynineteen_discussion_avatars_list($discussion->authors) !!}
            @endif
            {!! twentynineteen_comment_count() !!}
        </span>

        {{-- Edit post link. --}}
        {!! edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers. */
                    __('Edit <span class="screen-reader-text">%s</span>', THEME_TD),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                get_the_title()
            ),
            '<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
            '</span>'
        );!!}
    </div><!-- .entry-meta -->
@endif
