const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// ADMINWRAP LITE PACKAGES CSS
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap/css/bootstrap.min.css');
mix.copy('resources/sass/pages/perfect-scrollbar.scss', 'public/css/perfect-scrollbar.css');
mix.copy('resources/sass/morrisjs/morris.css', 'public/css/morrisjs/morris.css');
mix.copy('resources/sass/c3-master/c3.min.css', 'public/css/c3-master/c3.min.css');
mix.copy('resources/sass/pages/dashboard1.scss', 'public/css/pages/dashboard1.css');
mix.copy('resources/sass/colors/default.scss', 'public/css/colors/default.css');
  

// ADMINWRAP LITE PACKAGES JS
mix.copy('resources/js/jquery.3.2.0.min.js', 'public/js/jquery.3.2.0.min.js');
mix.copy('resources/js/popper.min.js', 'public/js/popper.min.js');
mix.copy('resources/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
mix.copy('resources/js/raphael/raphael-min.js', 'public/js/raphael/raphael-min.js');
mix.copy('resources/js/morrisjs/morris.min.js', 'public/js/morrisjs/morris.min.js');

mix.copy('resources/js/d3/d3.min.js', 'public/js/d3/d3.min.js');
mix.copy('resources/js/c3-master/c3.min.js', 'public/js/c3-master/c3.min.js');

mix.browserSync('http://localhost:8000/');