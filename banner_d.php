
<style type="text/css">
</style></head>

<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript" src="fadeslideshow.js">

</script>

<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow4", //ID of blank DIV on page to house Slideshow
	dimensions: [132, 491], //width/height of gallery in pixels. Should reflect dimensions of largest image
	/*imagearray: [
		
		["banners/d_01.jpg"],
		["banners/d_02.jpg"],		
		["banners/d_03.jpg"]*/    //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:3500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 700, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})


</script>

<div align="center"><div id="fadeshow4">