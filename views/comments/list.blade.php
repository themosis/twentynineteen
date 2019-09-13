<div id="comments" class="{{ comments_open() ? 'comments-area' : 'comments-area comments-closed' }}">
    <div class="{{ $discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses' }}">
        <h2 class="comments-title">
            @if(comments_open())
                @if(have_comments())
                    {{ __('Join the Conversation', THEME_TD) }}
                @else
                    {{ __('Leave a comment', THEME_TD) }}
                @endif
            @else
                @if('1' == $discussion->responses)
                    {{-- translators: %s: post title --}}
                    {!! sprintf(_x('One reply on &ldquo;%s&rdquo;', 'comments title', THEME_TD), get_the_title()) !!}
                @else
                    {{-- translators: 1: number of comments, 2: post title --}}
                    {!! sprintf(
                        _nx(
                            '%1$s reply on &ldquo;%2$s&rdquo;',
                            '%1$s replies on &ldquo;%2$s&rdquo;',
                            $discussion->responses,
                            'comments title',
                            THEME_TD
                        ),
                        number_format_i18n($discussion->responses),
                        get_the_title()
                    ) !!}
                @endif
            @endif
        </h2><!-- .comments-title -->
        {{-- Only show discussion meta information when comments are open and available. --}}
        @if(have_comments() && comments_open())
            @template('template-parts.post.discussion', 'commentmeta')
        @endif
    </div><!-- .comments-title-flex -->
    @if(have_comments())
        {{-- Show comment form at top if showing newest comments at the top. --}}
        @if(comments_open())
            @php(twentynineteen_comment_form('desc'))
        @endif
        <ol class="comment-list">
            {!! wp_list_comments([
                'walker' => new \Theme\Walkers\TwentyNineteen_Walker_Comment(),
                'avatar_size' => twentynineteen_get_avatar_size(),
                'short_ping' => true,
                'style' => 'ol',
                'echo' => false
            ]) !!}
        </ol><!-- .comment-list -->

        {{-- Show comment navigation --}}
        @if(have_comments())
            {!! get_the_comments_navigation([
                'prev_text' => sprintf(
                    '%s <span class="nav-prev-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>',
                    twentynineteen_get_icon_svg('chevron_left', 22),
                    __('Previous', THEME_TD),
                    __('Comments', THEME_TD)
                ),
                'next_text' => sprintf(
                    '<span class="nav-next-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span> %s',
                    __('Next', THEME_TD),
                    __('Comments', THEME_TD),
                    twentynineteen_get_icon_svg('chevron_right', 22)
                )
            ]) !!}
        @endif

        {{-- Show comment form at bottom if showing newest comments at the bottom. --}}
        @if(comments_open() && 'asc' === strtolower(get_option('comment_order', 'asc')))
            <div class="comment-form-flex">
                <span class="screen-reader-text">{{ __('Leave a comment', THEME_TD) }}</span>
                @php(twentynineteen_comment_form('asc'))
                <h2 class="comments-title" aria-hidden="true">{{ __('Leave a comment', THEME_TD) }}</h2>
            </div>
        @endif

        {{-- If comments are closed and there are comments, let's leave a little note, shall we? --}}
        @if(! comments_open())
            <p class="no-comments">
                {{ __('Comments are closed.', THEME_TD) }}
            </p>
        @endif
    @else
        {{-- Show comment form. --}}
        @php(twentynineteen_comment_form(true))
    @endif {{-- if have_comments(); --}}
</div><!-- #comments -->
