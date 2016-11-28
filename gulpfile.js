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
 /* mix.copy('node_modules/vue-cookie/build/vue-cookie.js',
    'resources/assets/js');
*/


    mix.sass('app.scss')
//      .scripts('../../../node_modules/vue-cookie/build/vue-cookie.js')
      .webpack('app.js');

});
