$(document).ready(function() {

/*---variable liées au responsive----*/
    var WIDTH = $(window).width();
    var HEIGHT = $(window).height();
    var COEFFW = WIDTH /1920;
    var COEFFH = HEIGHT /1080;

$("#playground").children(function(){
var neww = $(this).width()*COEFFW
var newh = $(this).height()*COEFFH
$('this').css({
    'width':neww,
    'height':newh
});
});


});