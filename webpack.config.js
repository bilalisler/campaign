// environment variables
require('dotenv').config();

//https://symfony.com/doc/current/frontend/encore/simple-example.html

// webpack.config.js
let Encore = require('@symfony/webpack-encore');

const publicPath = 'build';

Encore
// the project directory where all compiled assets will be stored
  .setOutputPath('public/build/')

  // the public path used by the web server to access the previous directory
  .setPublicPath(publicPath)

  // empty the outputPath dir before each build
  .cleanupOutputBeforeBuild()

  // will create web/build/app.js and web/build/app.css
  .addEntry('app', './assets/js/app.js')

  // allow legacy applications to use $/jQuery as a global variable
  .autoProvidejQuery()

  //
  .enableReactPreset()

  // enable source maps during development
  .enableSourceMaps(!Encore.isProduction())

  // show OS notifications when builds finish/fail
  //.enableBuildNotifications()

  // allow sass/scss files to be processed

  //.enableSassLoader()


  // .enablePostCssLoader((options) => {
  //   options.config = {
  //     path: 'config/postcss.config.js'
  //   }
  // })


  // .addLoader({
  //   test: /\.(js|jsx)$/,
  //   loader: 'eslint-loader',
  //   exclude: [/node_modules/],
  //   enforce: 'pre',
  //   options: {
  //     configFile: './.eslintrc',
  //     emitWarning: true
  //   }
  // })
;

console.log('Default assets file path is configured as ' + publicPath);

// export the final configuration
module.exports = Encore.getWebpackConfig();
