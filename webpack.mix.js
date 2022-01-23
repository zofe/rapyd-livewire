
let path = require('path');
let mix = require('laravel-mix');
//let webpack = require('webpack');

//mix
    // .options({
    //     terser: {
    //         terserOptions: {
    //             compress: {
    //                 drop_console: true
    //             }
    //         }
    //     }
    // })
    //.setPublicPath("public")
mix.js("resources/js/rapyd.js", "public")
    .vue()
    .sass('resources/sass/rapyd.scss', 'public').sourceMaps(true, 'source-map')
//.version()
    // .webpackConfig({
    //     resolve: {
    //         symlinks: false,
    //         alias: {
    //             "@": path.resolve(__dirname, "resources/js/")
    //         }
    //     },
    //     plugins: [new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)]
    // });
