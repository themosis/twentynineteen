<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<div class="site-branding">

    @if(has_custom_logo())
        <div class="site-logo">{!! get_custom_logo() !!}</div>
    @endif
    @if(!empty($blogname))
        @if(is_front_page() && is_home())
            <h1 class="site-title">
                <a href="{{ esc_url(home_url('/')) }}" rel="home">{{ $blogname }}</a>
            </h1>
        @else
            <p class="site-title">
                <a href="{{ esc_url(home_url('/')) }}" rel="home">{{ $blogname }}</a>
            </p>
        @endif
    @endif

    @if($blogdescription || is_customize_preview())
        <p class="site-description">{{ $blogdescription }}</p>
    @endif

    @if(has_nav_menu('menu-1'))
        <nav id="site-navigation" class="main-navigation" aria-label="{{ esc_attr('Top Menu', THEME_TD) }}">
            {!! wp_nav_menu([
                'theme_location' => 'menu-1',
                'menu_class' => 'main-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'echo' => false
            ]) !!}
        </nav><!-- #site-navigation -->
    @endif

    @if(has_nav_menu('social'))
        <nav class="social-navigation" aria-label="<?php esc_attr_e('Social Links Menu', 'twentynineteen'); ?>">
            {!! wp_nav_menu([
                'theme_location' => 'social',
                'menu_class' => 'social-links-menu',
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>' . twentynineteen_get_icon_svg('link'),
                'depth' => 1,
                'echo' => false
            ]) !!}
        </nav><!-- .social-navigation -->
    @endif
</div><!-- .site-branding -->
