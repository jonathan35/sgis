<?php 
require_once("Connections/pamconnection.php");
$banner_query=mysqli_query($conn, "SELECT * FROM banner WHERE status=1 ORDER BY position asc, banner_id desc");
$banner=mysqli_fetch_assoc($banner_query);
?>
<style>
#rotator
{
	cursor: pointer;
	overflow: hidden;
	position: relative;
	width: 950px;
	height: 350px;
}
#rotator img
{
	border: 0px none;
	cursor: pointer;
	width: 950px;
	height: 350px;
}
#rotator img
{
	display: none;
	position: absolute;
}
#sideban img
{
	display: none;
	position: absolute;
	top:0;
	left:0;
}
</style>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<link href="css.css" rel="stylesheet" type="text/css">
<script src="xfade2.js" language="JavaScript" type="text/JavaScript"></script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery.showcase.2.0.js"></script>
    
	<script type="text/javascript">
		$(function() {
			$("#showcats").showcase({
				animation: { interval: 3200, stopOnHover: false, easefunction: "swing", speed: 2000, type: "fade" },
                css: { width: "100%", height: "100%" },
				images: [
						 <?php do{?>
										{ url:"<?php echo $banner['banner_file'];?>", link:"#", target: "" },
						<?php }while($banner = mysqli_fetch_assoc($banner_query));?>
					     ],
			navigator: { position:"top-right", orientation: "horizontal", showNumber:true,
					 item: {
						 css: {
							 width: "15px", height:"15px", "line-height": "15px",
							 backgroundColor: "#ffffff", borderColor: "ffffff", "font-weight": "normal", "font-family": "Arial, Helvetica, sans-serif", "font-size" : "10px", "color":"#666666"},
						 cssHover: {
							 backgroundColor: "#98A3B5", borderColor: "#98A3B5" },
						 cssSelected: {
							 backgroundColor: "#98A3B5", borderColor: "#98A3B5", "font-weight": "bold", "color":"#ffffff" }
					 }
				},
                titleBar: { enabled: false }
			});
            
			SyntaxHighlighter.all();
			
			
		});
	</script> 
    
    <div style="height:350px !important; overflow:hidden !important;">
		<div id="showcats" style="height:350px !important; overflow:hidden !important;"></div>
	</div> 

<!--<div id="rotator">
  <?php //if($banner!=''){ do{?>
  <img src="<?php //echo $banner['banner_file']?>" width="920" height="500" />
  <?php //}while($banner=mysqli_fetch_array($banner_query));}?>
</div>  -->
