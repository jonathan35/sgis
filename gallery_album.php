<?php require_once('Connections/pamconnection.php');


$query="select * from album where status=1 order by position asc, album_id desc";

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
<script>
function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
</script>

<table width="98%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="0" height="0">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <?php 
	if($row_Rs1!=''){
	$counter=1; 
	do{	
	$photo_query = mysqli_query($conn, "select * from washington_gallery where status=1 and album_id='".$row_Rs1['album_id']."' order by position asc, id desc");
	$photo_set = mysqli_fetch_array($photo_query);

if($photo_set['photo1']!='' && file_exists($photo_set['photo1'])){
	$photo = $photo_set['photo1'];
}else{
	$photo="images/default_image_small.jpg";
}
	
	


	if($counter==1){?>
        <tr>
          <td valign="top">
            <div align="left">
              <table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0">
                <tr valign="middle" style="height:120px;">
                  <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center">
                  <a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result">
                  <img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
                </tr>
                <tr valign="top">
                  <td><div align="left" class="content_text">
                    <div align="center"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result"><strong> <?php echo $row_Rs1['album_name']?></strong></a>
                    </div>
                    <br>
                  </div></td>
                </tr>
              </table>
            </div></td>
          <?php $counter++;
		}elseif($counter==2){?>
          <!--<td width="0" background="images/line_dotted.gif"><img src="images/space.gif" width="1" height="20"></td> -->
          <td valign="top"><table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0">
              <tr valign="middle" style="height:120px;">
                <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result"> <img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
              </tr>
              <tr valign="top">
                <td><div align="left" class="content_text">
                  <div align="center"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result"><strong> <?php echo $row_Rs1['album_name']?></strong></a> </div>
                  <br>
                </div></td>
              </tr>
          </table></td>
          <?php $counter++;
		}elseif($counter==3){?>
          <!--<td width="0" background="images/line_dotted.gif"><img src="images/space.gif" width="1" height="20"></td> -->
          <td valign="top"><table width="160" height="0" border="0" align="center" cellpadding="10" cellspacing="0">
              <tr valign="middle" style="height:120px;">
                <td background="images/frame.gif" style="background-repeat:no-repeat; background-position:center" align="center"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result"> <img src="<?php echo $photo?>" alt="" width="150" height="113" border="0" class="photo_border" /></a></td>
              </tr>
              <tr valign="top">
                <td><div align="left" class="content_text">
                  <div align="center"><a href="result.php?root=<?php echo $_GET['root'];?>&id=<?php echo $_GET['id']?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>&mcat=<?php echo base64_encode($row_Rs1['album_id'])?>#result"><strong> <?php echo $row_Rs1['album_name']?></strong></a> </div>
                  <br>
                </div></td>
              </tr>
          </table></td>
        </tr>
       <!-- <tr>
          <td colspan="7" bgcolor="#CCCCCC" height="1"><div align="left"></div></td>
        </tr> -->
        <?php $counter=1;}
	  }while($row_Rs1 = mysqli_fetch_assoc($Rs1));
	  }
	  else{
	  //if record is empty ?>
        <tr>
          <td colspan="7" height="50" valign="bottom" align="center"><div align="center" class="heading4">NO ALBUM AVAILABLE AT THE MOMENT</div></td>
        </tr>	  
	  <?php }?>
      </table>
      </td>
  </tr>
    </table>
