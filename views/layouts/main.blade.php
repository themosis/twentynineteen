<!doctype html>
<html {!! get_language_attributes(); !!}>
<head>
    <meta charset="{{ get_bloginfo('charset') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    @head
</head>
<body @php(body_class())>
@php(wp_body_open())
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">{{ __('Skip to content', THEME_TD) }}></a>
    <header id="masthead" class="{{ is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header' }}">
        <div class="site-branding-container">
            @template('template-parts.header.site', 'branding')
        </div>
        @if(is_singular() && twentynineteen_can_show_post_thumbnail())
            <div class="site-featured-image">
                <?php
                    twentynineteen_post_thumbnail();
                    the_post();
                ?>
                <div class="{{ $classes }}">
                    @template('template-parts.header.entry', 'postheader')
                </div>
                @php(rewind_posts())
            </div>
        @endif
    </header><!-- #masthead -->
    <div id="content" class="site-content">
        @yield('site-content')
    </div>
    <footer id="colophon" class="site-footer">
        @template('template-parts.footer.footer', 'widgets')
        <div class="site-info">
            @if(! empty($blogname))
                <a href="{{ esc_url(home_url('/')) }}" rel="home" class="site-name">{{ $blogname }}</a>
            @endif
            <a href="{{ esc_url('https://wordpress.org') }}" class="imprint">
                {{ sprintf(__('Proudly powered by %s', THEME_TD), 'WordPress') }}
            </a>
            @if(function_exists('get_the_privacy_policy_link'))
                {!! get_the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>') !!}
            @endif
            @if(has_nav_menu('footer'))
                <nav class="footer-navigation" aria-label="{{ esc_attr('Footer Menu', THEME_TD) }}">
                    {!! wp_nav_menu([
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                            'depth' => 1,
                            'echo' => false
                        ]); !!}
                </nav><!-- .footer-navigation -->
            @endif
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->
@footer
</body>
</html>