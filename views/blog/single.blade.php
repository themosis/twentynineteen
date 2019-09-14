@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @loop
                @template('template-parts.content.content', 'single')

                @if(is_singular( 'attachment' ))
                    {{-- Parent post navigation. --}}
                    {!! get_the_post_navigation([
                        'prev_text' => sprintf( __('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', THEME_TD), '%title')
                    ]) !!}
                @elseif(is_singular('post'))
                    {{-- Previous/next post navigation. --}}
                    {!! get_the_post_navigation([
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next Post', THEME_TD) . '</span> ' .
                            '<span class="screen-reader-text">' . __('Next post:', THEME_TD) . '</span> <br/>' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous Post', THEME_TD) . '</span> ' .
                            '<span class="screen-reader-text">' . __('Previous post:', THEME_TD) . '</span> <br/>' .
                            '<span class="post-title">%title</span>',
                    ]) !!}
                @endif

                {{-- If comments are open or we have at least one comment, load up the comment template. --}}
                @if(comments_open() || get_comments_number())
                    @php(comments_template('/views/comments/template.php'))
                @endif
            @endloop
        </main><!-- #main -->
    </section><!-- #primary -->
@endsection
