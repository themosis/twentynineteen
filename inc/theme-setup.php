<?php

if (!function_exists('twentynineteen_setup')) {
    /**
     * Sets up theme defaults.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function twentynineteen_setup()
    {
        set_post_thumbnail_size(1568, 9999);

        // Load editor styles.
        add_editor_style('dist/css/style-editor.css');
    }
}

Action::add('after_setup_theme', 'twentynineteen_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('twentynineteen_content_width', 640);
}

Action::add('after_setup_theme', 'twentynineteen_content_width', 0);

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix()
{
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
        /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function () {
            var t, e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
        }, !1);
    </script>
    <?php
}

Action::add('wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix');

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles()
{
    wp_enqueue_style(
        'twentynineteen-editor-customizer-styles',
        get_theme_file_uri('dist/css/style-editor-customizer.css'),
        false,
        '1.1',
        'all'
    );

    if ('custom' === get_theme_mod('primary_color')) {
        // Include color patterns.
        require_once get_parent_theme_file_path('/helpers/color-patterns.php');
        wp_add_inline_style('twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css());
    }
}

Action::add('enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles');

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap()
{
    // Only include custom colors in customizer or frontend.
    if ((!is_customize_preview() && 'default' === get_theme_mod('primary_color', 'default')) || is_admin()) {
        return;
    }

    require_once get_parent_theme_file_path('/helpers/color-patterns.php');

    $primary_color = 199;

    if ('default' !== get_theme_mod('primary_color', 'default')) {
        $primary_color = get_theme_mod('primary_color_hue', 199);
    }
    ?>

    <style type="text/css"
           id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint($primary_color) . '"' : ''; ?>>
        <?php echo twentynineteen_custom_colors_css(); ?>
    </style>
    <?php
}

Action::add('wp_head', 'twentynineteen_colors_css_wrap');