@extends('layouts.main')

@section('site-content')
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            @while(have_posts())
                @php(the_post())
                @template('template-parts.content.content', 'page')

                @if(comments_open() || get_comments_number())
                    @php(comments_template('/views/comments/template.php'))
                @endif
            @endwhile
        </main>
    </section>
@endsection