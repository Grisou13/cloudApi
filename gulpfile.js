var elixir = require('laravel-elixir');
var gutil = require('gulp-util');
var gulp = require('gulp');
var ftp = require('gulp-ftp');
var Task = elixir.Task;
elixir.config.js.browserify.transformers[0].options.presets.push('stage-0');
//require("laravel-elixir-webpack");
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
//Blocage d'une requête multi-origines (Cross-Origin Request) : la politique « Same Origin » ne permet pas de consulter la ressource distante située sur http://127.0.0.1:8000/api/auth/jwt/get_token. Raison : l'en-tête CORS « Access-Control-Allow-Origin » ne correspond pas à « *, http://localhost:8000 ».
var credentials = {
    ftp:{
        host:"ricci.cpnv-es.ch",
        username:"ricci",
        password:"Vegp6bnr",
        path:"~/apps/pre-tpi",
        port:"21",
        public_path:"public/"
    }
};
elixir.extend("upload", function(ftpParams) {
    new Task('upload', function() {
        return gulp.src('./**/*.*')
            .pipe(ftp(ftpParams))
            .pipe(gutil.noop());
    })
    .watch("./**/*.*");

});

elixir(function(mix) {
    mix.browserify("_docs.js",'public/js/doc.js').browserify('app.js','public/js/app.js');
    //mix.upload(credentials.ftp);
    mix.sass("docs.scss",'public/css/docs.css');

});
