const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .copy('node_modules/jquery.mask/dist/jquery.mask.min.js', 'public/js');