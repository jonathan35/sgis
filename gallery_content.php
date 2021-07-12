<?php require_once('Connections/pamconnection.php');

if($_GET['mcat']!=''){
	$abc=base64_decode($_GET['mcat']);
	$album_id=mysqli_real_escape_string($conn, $abc);
	$query="select * from washington_gallery where status=1 and album_id='".$album_id."' and album_id!='' order by position asc, id desc";
}else{
	$query="select * from washington_gallery where status=1 order by position asc, id desc";
}
$currentPage = $_SERVER["PHP_SELF"];
$maxRows_Rs1 = 12;
$pageNum_Rs1 = 0;
if(!empty($_GET['pageNum_Rs1'])) {
  $pageNum_Rs1 = $_GET['pageNum_Rs1'];
}
$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;

$colname_Rs1 = "";
mysqli_select_db($conn, $database_pamconnection);

$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);
$Rs1 = mysqli_query($conn, $query_limit_Rs1) or die(mysqli_error());
$row_Rs1 = mysqli_fetch_assoc($Rs1);

if(!empty($_GET['totalRows_Rs1'])) {
  $totalRows_Rs1 = $_GET['totalRows_Rs1'];
} else {
  $all_Rs1 = mysqli_query($conn, $query);
  $totalRows_Rs1 = mysqli_num_rows($all_Rs1);
  
}
$totalPages_Rs1 = ceil($totalRows_Rs1/$maxRows_Rs1)-1;

$queryString_Rs1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
	if (stristr($param, "pageNum_Rs1") == false && 
		stristr($param, "totalRows_Rs1") == false) {
	  array_push($newParams, $param);
	}
  }
  if (count($newParams) != 0) {
	$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
  }
}	

?>


<link href="css.css" rel="stylesheet" type="text/css">
<script src="js/jsapi" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	google.load("jquery", "1.3");
</script>
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<script>
function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gallery"><!--class="gallery clearfix"> -->

  <!--<tr>
    <td align="left" width="100%" class="heading3"><strong>
	<a href="result.php?root=OTU=" target="_parent"> <strong>Photo Gallery</strong></a>&nbsp;&nbsp;<img src="images/pointer03.gif" style="vertical-align:middle;" />&nbsp;&nbsp;
	<?php 
	//$album_query = mysqli_query($conn, "SELECT * FROM 	album WHERE album_id='".base64_decode($_GET['mcat'])."' ");
	//$album = mysqli_fetch_assoc($album_query );
	//echo $album['album_name'];
	?>
   </strong> </td>
  </tr> -->
    <tr>
    <td> <br />  </td>
  </tr>
          <!--<tr>
          <td colspan="7" bgcolor="#CCCCCC" height="1"><div align="left"></div></td>
        </tr> -->

  
    <tr>
    <td>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center" >
        <?php 
	if($row_Rs1!=''){
	$counter=1; 
	do{	
	//$photo_query = mysqli_query($conn, "select * from washington_gallery where status=1 and album_id='".$row_Rs1['album_id']."' order by position asc, id desc");
	//$photo_set = mysqli_fetch_array($photo_query);

if($row_Rs1['photo1']!=''){
	$photo = $row_Rs1['photo1'];
}else{
	$photo="images/default_image_small.jpg";
}
	
	


	if($counter==1){?>
        <tr>
          <td valign="top">
            <div align="left">
              <table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0" style="margin-top:10px; margin-bottom:10px;">
                <tr valign="middle" style="height:120px;">
                  <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center">
                  <a href="project_detail.php?ie=UTF-8&oe=UTF-8&q=prettyphoto&photo_id=<?php echo $row_Rs1['id']?>&iframe=true&width=70%&height=70%" rel="prettyPhoto[iframe]">
                  <img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
                </tr>
                <tr valign="top">
                  <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="86%">
                        <div align="left" class="content_text">
                    <div align="center">
                   <strong> <?php echo stripslashes(stripslashes($row_Rs1['product_name']))?></strong>
                    
                    </div>
                    
                    
                    
                  </div>
                        
                        </td>
                       
                      </tr>
                    </table>

                  
                  </td>
                </tr>
              </table>
            </div></td>
          <?php $counter++;
		}elseif($counter==2){?>
          <!--<td width="0" background="images/line_dotted.gif"><img src="images/space.gif" width="1" height="20"></td> -->
          <td valign="top">
            <table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0" style="margin-top:10px; margin-bottom:10px;">
              <tr valign="middle" style="height:120px;">
                <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center"><a href="project_detail.php?ie=UTF-8&amp;oe=UTF-8&amp;q=prettyphoto&amp;photo_id=<?php echo $row_Rs1['id']?>&amp;iframe=true&amp;width=70%&amp;height=70%" rel="prettyPhoto[iframe]"><img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
              </tr>
              <tr valign="top">
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="86%"><div align="left" class="content_text">
                      <div align="center"> <strong> <?php echo stripslashes(stripslashes($row_Rs1['product_name']))?></strong></div>
                    </div></td>
                    
                  </tr>
                </table>
                  </td>
              </tr>
          </table></td>
          <?php $counter++;
		}elseif($counter==3){?>
         <!-- <td width="0" background="images/line_dotted.gif"><img src="images/space.gif" width="1" height="20"></td> -->
          <td valign="top">
            <table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0" style="margin-top:10px; margin-bottom:10px;">
              <tr valign="middle" style="height:120px;">
                <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center">
                <a href="project_detail.php?ie=UTF-8&amp;oe=UTF-8&amp;q=prettyphoto&amp;photo_id=<?php echo $row_Rs1['id']?>&amp;iframe=true&amp;width=70%&amp;height=70%" rel="prettyPhoto[iframe]"><img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
              </tr>
              <tr valign="top">
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="86%"><div align="left" class="content_text">
                      <div align="center"> <strong> <?php echo stripslashes(stripslashes($row_Rs1['product_name']))?></strong></div>
                    </div></td>
                    
                  </tr>
                </table>
                  </td>
              </tr>
          </table></td>
        </tr>
        <!--<tr>
          <td colspan="7" bgcolor="#CCCCCC" height="1"><div align="left"></div></td>
        </tr> -->
        <?php $counter=1;}
	  }while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	  }
	  else{
	  //if record is empty ?>
        <tr>
          <td colspan="7" height="50" valign="bottom" align="center"><div align="center" class="heading4">NO PHOTO AVAILABLE AT THE MOMENT</div></td>
        </tr>	  
	  <?php }?>
      </table>
      
      </td>
  </tr>
</table>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
	});
</script>

