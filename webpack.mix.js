let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('dist');

mix.sass('assets/sass/style.scss', 'dist/css/style.css')
    .sass('assets/sass/style-editor.scss', 'dist/css/style-editor.css')
    .sass('assets/sass/style-editor-customizer.scss', 'dist/css/style-editor-customizer.css')
    .sass('assets/sass/print.scss', 'dist/css/print.css');