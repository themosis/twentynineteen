@if((bool) get_the_author_meta('description'))
    <div class="author-bio">
        <h2 class="author-title">
			<span class="author-heading">
				{!! sprintf(
					/* translators: %s: post author */
					__( 'Published by %s', THEME_TD),
					esc_html(get_the_author())
				) !!}
			</span>
        </h2>
        <p class="author-description">
            @php(the_author_meta('description'))
            <a class="author-link" href="{{ esc_url(get_author_posts_url(get_the_author_meta('ID'))) }}" rel="author">
                {{ __('View more posts', THEME_TD) }}
            </a>
        </p><!-- .author-description -->
    </div><!-- .author-bio -->
@endif
