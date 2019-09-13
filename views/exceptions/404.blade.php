@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <div class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title">{!! __('Oops! That page can&rsquo;t be found.', THEME_TD) !!}</h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p>{{ __('It looks like nothing was found at this location. Maybe try a search?', THEME_TD) }}</p>
                    {!! get_search_form(['echo' => false]) !!}
                </div><!-- .page-content -->
            </div><!-- .error-404 -->

        </main><!-- #main -->
    </section><!-- #primary -->
@endsection
