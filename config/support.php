<?php

/**
 * Edit this file in order to add theme support features.
 *
 * @see https://developer.wordpress.org/reference/functions/add_theme_support/
 */
return [
    /* ----------------------------------------------------------------------------------------------- */
    // Post Thumbnails
    // @see https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    /* ----------------------------------------------------------------------------------------------- */
    'post-thumbnails' => ['post', 'page'],

    /* ----------------------------------------------------------------------------------------------- */
    // Post Formats
    // @see https://developer.wordpress.org/themes/functionality/post-formats/
    /* ----------------------------------------------------------------------------------------------- */
    'post-formats' => [],

    /* ----------------------------------------------------------------------------------------------- */
    // Title Tag
    /* ----------------------------------------------------------------------------------------------- */
    'title-tag',

    /* ----------------------------------------------------------------------------------------------- */
    // HTML 5
    /* ----------------------------------------------------------------------------------------------- */
    'html5' => ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption'],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom logo
    // @see https://developer.wordpress.org/themes/functionality/custom-logo/
    /* ----------------------------------------------------------------------------------------------- */
    'custom-logo' => [
        'height' => 190,
        'width' => 190,
        'flex-width' => false,
        'flex-height' => false
    ],
    /* ----------------------------------------------------------------------------------------------- */
    // Feed Links
    /* ----------------------------------------------------------------------------------------------- */
    'automatic-feed-links',

    /* ----------------------------------------------------------------------------------------------- */
    // Customize Selective Refresh For Widgets
    /* ----------------------------------------------------------------------------------------------- */
    'customize-selective-refresh-widgets',

    /* ----------------------------------------------------------------------------------------------- */
    // Block Styles
    /* ----------------------------------------------------------------------------------------------- */
    'wp-block-styles',

    /* ----------------------------------------------------------------------------------------------- */
    // Add support for full and wide align images.
    /* ----------------------------------------------------------------------------------------------- */
    'align-wide',

    /* ----------------------------------------------------------------------------------------------- */
    // Add support for editor styles (see theme-setup.php).
    /* ----------------------------------------------------------------------------------------------- */
    'editor-styles',

    /* ----------------------------------------------------------------------------------------------- */
    // Add editor custom sizes
    /* ----------------------------------------------------------------------------------------------- */
    'editor-font-sizes' => [
        [
            'name' => __('Small', THEME_TD),
            'shortName' => __('S', THEME_TD),
            'size' => 19.5,
            'slug' => 'small'
        ],
        [
            'name' => __('Normal', THEME_TD),
            'shortName' => __('M', THEME_TD),
            'size' => 22,
            'slug' => 'normal',
        ],
        [
            'name' => __('Large', THEME_TD),
            'shortName' => __('L', THEME_TD),
            'size' => 36.5,
            'slug' => 'large',
        ],
        [
            'name' => __('Huge', THEME_TD),
            'shortName' => __('XL', THEME_TD),
            'size' => 49.5,
            'slug' => 'huge',
        ]
    ],

    /* ----------------------------------------------------------------------------------------------- */
    // Add editor custom colors
    /* ----------------------------------------------------------------------------------------------- */
    'editor-color-palette' => [
        [
            'name' => __('Primary', THEME_TD),
            'slug' => 'primary',
            'color' => twentynineteen_hsl_hex(
                'default' === get_theme_mod('primary_color')
                    ? 199
                    : get_theme_mod('primary_color_hue', 199),
                100,
                33
            ),
        ],
        [
            'name' => __('Secondary', THEME_TD),
            'slug' => 'secondary',
            'color' => twentynineteen_hsl_hex(
                'default' === get_theme_mod('primary_color')
                    ? 199
                    : get_theme_mod('primary_color_hue', 199),
                100,
                23
            ),
        ],
        [
            'name' => __('Dark Gray', THEME_TD),
            'slug' => 'dark-gray',
            'color' => '#111',
        ],
        [
            'name' => __('Light Gray', THEME_TD),
            'slug' => 'light-gray',
            'color' => '#767676',
        ],
        [
            'name' => __('White', THEME_TD),
            'slug' => 'white',
            'color' => '#FFF',
        ]
    ],

    /* ----------------------------------------------------------------------------------------------- */
    // Add responsive embeds support
    /* ----------------------------------------------------------------------------------------------- */
    'responsive-embeds',

    /* ----------------------------------------------------------------------------------------------- */
    // Starter Content
    // @see https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
    /* ----------------------------------------------------------------------------------------------- */
    //'starter-content' => [],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom Background
    /* ----------------------------------------------------------------------------------------------- */
    'custom-background' => [
        'default-color' => 'ffffff',
        'default-image' => '',
        //    'wp-head-callback' => '_custom_background_cb',
        //    'admin-head-callback' => '',
        //    'admin-preview-callback' => ''
    ],

    /* ----------------------------------------------------------------------------------------------- */
    // Custom Header
    // @see https://developer.wordpress.org/themes/functionality/custom-headers/
    /* ----------------------------------------------------------------------------------------------- */
    //'custom-header' => [
    //    'default-image' => '',
    //    'random-default' => false,
    //    'width' => 0,
    //    'height' => 0,
    //    'flex-height' => false,
    //    'flex-width' => false,
    //    'default-text-color' => '',
    //    'header-text' => true,
    //    'uploads' => true,
    //    'wp-head-callback' => '',
    //    'admin-head-callback' => '',
    //    'admin-preview-callback' => '',
    //]
];
