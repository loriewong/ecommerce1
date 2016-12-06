const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix.sass('app.scss')
    .copy('node_modules/toastr/build/toastr.min.js', 'public/js/toastr.min.js')
    .copy('node_modules/toastr/build/toastr.min.css', 'public/css/toastr.min.css')
    .copy('resources/assets/img', 'public/img')
    .webpack('app.js');

});
