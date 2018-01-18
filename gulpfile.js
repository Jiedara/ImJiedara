var oyana = require('gulp-oyana');

var options = {
    "jsMinPath" : "./js",
    "jsPath" : "./js",
    "jsName" : "script.min",
    "cssPath" : "./css",
    "scssPath" : "./scss",
    "cssName" : "style.min",
    "outputStyle" : "compressed",
    "proxyPath" : "http://localhost"
}
oyana( options );
