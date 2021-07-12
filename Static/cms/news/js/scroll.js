function redraw2() {
if (document.ASMBLR2.redraw2.winWidth != window.innerWidth  || document.ASMBLR2.redraw2.winHeight != window.innerHeight) {
document.location = document.location;
}
}
function redrawInit2() {
if (n2) {
document.ASMBLR2 = new Object;
document.ASMBLR2.redraw2 = new Object;
document.ASMBLR2.redraw2.winWidth = window.innerWidth;
document.ASMBLR2.redraw2.winHeight = window.innerHeight;
window.onresize = redraw2();
}
}

function shiftTo2(obj, x, y) {
if (n2) {
obj.moveTo(x,y);
}
else {
obj.pixelLeft = x;
obj.pixelTop = y;
}
}
function getObject(obj) {
var theObj = eval("document." + range + obj + styleObj);
return theObj;
}
function getObject2(obj) {
var theObj2 = eval("document." + range2 + obj + styleObj2);
return theObj2;
}

function scrollUp2() {
if (mutex2 == 1){
var theObj2 = getObject2(newsId2);
if (yplace2 < ymax2) {
yplace2 = yplace2 + speed2;
if (yplace2 > ymax2) yplace2 = ymax2;
shiftTo2(theObj2, xplace2, yplace2);
setTimeout("scrollUp2()",25);
}
}
}
function scrollDown2() {
if (mutex2 == 1){
var theObj2 = getObject(newsId2);
if (yplace2 > ymin2) {
yplace2 = yplace2 - speed2;
if (yplace2 < ymin2) yplace2 = ymin2;
shiftTo2(theObj2, xplace2, yplace2);
setTimeout("scrollDown2()",25);
}
}
}

function init2() {
redrawInit2();
theObj2 = getObject2(newsId2);
if (n2) ymin2 = (theObj2.clip2.height - newsHeight2) * -1;
else {
styleObj2 = "";
theObj2 = getObject2(newsId2);
ymin2 = (theObj2.offsetHeight - newsHeight2) * -1;
styleObj2 = ".style";
}
}

//----------------------------------------------------------

var n2 = (document.layers) ? 1:0
var ie2 = (document.all) ? 1:0
var range2 = "";
var styleObj2 = "";
var mutex2 = 0;
var yplace2 = 0;
var ymax2 = 0;
var ymin2 = 0;
var xplace2 = 0;
var speed2 = 4;                         //speed at which the news scrolls
var newsHeight2 = 225;                  //height of the news clipping div
var newsId2 = "news2";                   //name of the overall news div
var newsClipId2 = "newsClipping2";       //name of the news clipping div
if (ie2) {
range2 = "all.";
styleObj2 = ".style";
}
if (n2) newsId2 = newsClipId2 + ".document." + newsId2;

//----------------------------------------------------------------------

	var n = (document.layers) ? 1:0

	var ie = (document.all) ? 1:0

	var range = "";

	var styleObj = "";

	var mutex = 0;

	var yplace = 0;

	var ymax = 0;

	var ymin = 0;

	var xplace = 0;

	var speed = 4;                         //speed at which the news scrolls

	var newsHeight = 225;                  //height of the news clipping div

	var newsId = "news";                   //name of the overall news div

	var newsClipId = "newsClipping";       //name of the news clipping div

	if (ie) {

		range = "all.";

		styleObj = ".style";

	}