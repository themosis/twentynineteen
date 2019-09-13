@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @if(have_posts())
                <header class="page-header">
                    @php(the_archive_title('<h1 class="page-title">', '</h1>'))
                </header>
                @while(have_posts())
                    @php(the_post())
                    @template('template-parts.content.content', 'excerpt')
                @endwhile
                {{-- Previous/next page navigation --}}
                @php(twentynineteen_the_posts_navigation())
            @else
                @template('template-parts.content.content', 'none')
            @endif
        </main>
    </section>
@endsection