@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @if(have_posts())
                <header class="page-header">
                    <h1 class="page-title">
                        {{ __('Search results for:', THEME_TD) }}
                    </h1>
                    <div class="page-description">{{ get_search_query() }}</div>
                </header>
                @while(have_posts())
                    @php(the_post())

                    {{--
                      Include the Post-Format-specific template for the content.
				      If you want to override this in a child theme, then include a file
				      called content-___.php (where ___ is the Post Format name) and that will be used instead.
				      --}}
                    @template('template-parts.content.content', 'excerpt')
                @endwhile
                @php(twentynineteen_the_posts_navigation())
            @else
                @template('template-parts.content.content', 'none')
            @endif
        </main>
    </section>
@endsection