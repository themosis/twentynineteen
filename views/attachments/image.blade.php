@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @while(have_posts())
                @php(the_post())

                <article id="post-{{ get_the_ID() }}" {!! post_class() !!}>
                    <header class="entry-header">
                        {!! the_title('<h1 class="entry-title">', '</h1>', false) !!}
                    </header>

                    <div class="entry-content">
                        <figure class="entry-attachment wp-block-image">
                            {!! wp_get_attachment_image(get_the_ID(), apply_filters('twentynineteen_attachment_size', 'full')) !!}
                            <figcaption class="wp-caption-text">
                                @php(the_excerpt())
                            </figcaption>
                        </figure>
                        {!! Loop::content() !!}
                        {!! wp_link_pages([
                            'before' => '<div class="page-links"><span class="page-links-title">'.__('Pages:', THEME_TD).'</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'pagelink' => '<span class="screen-reader-text">'.__('Page', THEME_TD).'</span>%',
                            'separator' => '<span class="screen-reader-text">, </span>'
                        ]) !!}
                    </div><!-- .entry-content -->
                    <footer class="entry-footer">
                        @if($metadata = wp_get_attachment_metadata())
                            {!! sprintf(
                                '<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
                                _x('Full size', 'Used before full size attachment link.', THEME_TD),
                                esc_url(wp_get_attachment_url()),
                                absint($metadata['width']),
                                absint($metadata['height'])
                            ) !!}
                        @endif
                        @php(twentynineteen_entry_footer())
                    </footer>
                </article><!-- #post-{{ get_the_ID() }} -->
                {!! get_the_post_navigation([
                    'prev_text' => _x('<span class="meta-nav">Published in</span><br><span class="post-title">%title</span>', 'Parent post link', THEME_TD)
                ]) !!}

                {{-- If comments are open or we have at least one comment, load up the comment template. --}}
                @if(comments_open() || get_comments_number())
                    @php(comments_template('/views/comments/template.php'))
                @endif
            @endwhile
        </main>
    </section>
@endsection