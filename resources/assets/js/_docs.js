/**
 * Created by Thomas on 31.03.2016.
 */
var aglio = require('aglio');

var request = require('superagent')
    , fs = require('fs');

var stream = fs.createWriteStream('http://localhost:8000/docs/raw');
var req = request.get('/tmp.apil');
req.pipe(stream);
blueprint = fs.readFile('/tmp.apil','utf-8',function(err,data){
    if(err){
        console.log(err);
    }
    return data
});
console.log(blueprint);
var options = {
    themeVariables: 'default'
};

aglio.render(blueprint, options, function (err, html, warnings) {
    if (err) return console.log(err);
    if (warnings) console.log(warnings);

    console.log(html);
});