var elixir = require('laravel-elixir');
var gutil = require('gulp-util');
var gulp = require('gulp');
var ftp = require('gulp-ftp');
var Task = elixir.Task;
var aglio = require("aglio");
var request = require("superagent");
var fs = require('fs');
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
elixir.extend("generateDocs",function(){
    var options = {
        themeVariables: 'default'
    };
    new Task("generateDocs",function(){
        request.get("localhost:8000/api/docs/raw").end(function(err,res){
            if(err)
                return console.log(err);
            if(res.status === 200){

                aglio.render(res.text, options, function (err, html, warnings) {
                    if (err) return console.log(err);
                    if (warnings) console.log(warnings);
                    fs.writeFile("resources/views/api/docs.blade.php",html,function(err){
                        if(err)
                            return console.log(err);
                        console.log("finished")
                    });
                    //console.log(html);
                });


            }

        });
    });
});

elixir(function(mix) {
    mix.browserify("_docs.js",'public/js/docs.js');
    mix.browserify('app.js','public/js/app.js');
    //mix.upload(credentials.ftp);
    mix.sass("docs.scss",'public/css/docs.css');
    mix.generateDocs();

});
