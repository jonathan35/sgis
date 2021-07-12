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
	width: 488px;
	height: 200px;
}
#rotator img
{
	border: 0px none;
	cursor: pointer;
	width: 488px;
	height: 200px;
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

<div id="rotator">
  <?php if($banner!=''){ do{?>
  <img src="<?php echo $banner['banner_file']?>" width="488" height="200" />
  <?php }while($banner=mysqli_fetch_array($banner_query));}?>
</div>
