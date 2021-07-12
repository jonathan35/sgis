<?php require_once('Connections/pamconnection.php'); 

$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));

if($home=='1'){
	$cus_field_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE url_file='custom_field.php' and status=1 order by maincat_id asc limit 1 ");
	$cus_field_set = mysqli_fetch_assoc($cus_field_query);
	
	$root = base64_encode($cus_field_set['maincat_id']);
	$section_query = "and section_id=".$cus_field_set['maincat_id']; // define here and use at body
	
		/*if($cus_field_set!=''){
			$section_count = 1;
			$auto_section.= "and (";
			do{
				if($section_count!=1)$auto_section.= " or ";
				$auto_section.= "category like '%|".$cus_field_set['maincat_id']."|%'";
			$section_count++;
			}while($cus_field_set = mysqli_fetch_assoc($cus_field_query));
			$auto_section.= ")";
			//echo $auto_section;
		}*/
	$query="select * from custom_field_section where status=1 and category like '%|".$cus_field_set['maincat_id']."|%' order by id desc";
	
}else{
	$root = $_GET['root'];
	$section_query = "and section_id=".$section_id; // define here and use at body

	if($_GET['sub']){
		$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
	}elseif($_GET['main']){
		$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
	}elseif($_GET['root']){
		$category_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
	}

	if($category_id!=''){
		$query="select * from custom_field_section where status=1 and category like '%|".$category_id."|%' order by id desc";
	}	
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
		stristr($param, "totalRows_Rs1") == false){
	  array_push($newParams, $param);
	}
  }
  if (count($newParams) != 0) {
	$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
  }
}	
?>


<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="css.css" rel="stylesheet" type="text/css">

<table width="93%" border="0" cellpadding="0" cellspacing="10">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <?php if($row_Rs1!=''){ 
		$count=0;
		$count_no=$startRow_Rs1+1;
	do{?>
    <?php if($count==0){?><tr><?php }?>
    <td>
    <table width="160" border="0" cellspacing="0" cellpadding="0" align="center" style="border:0px #000 solid;">
                            <tr>
                              <td height="220" align="center" valign="top" background="images/biggerimagebg.gif" style="background-repeat:no-repeat; background-position:center;">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" valign="top">

<?php 
	$field_setting_query = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE field_status=1 $section_query and field_type='file' order by field_position asc limit 1 ");
	$field_setting = mysqli_fetch_assoc($field_setting_query);	
	$image_field = $field_setting['table_field'];
	
if($row_Rs1[$image_field]!=''&&file_exists($row_Rs1[$image_field])){?>
<a href="result.php?root=<?php echo $root?>&detail=<?php echo base64_encode($row_Rs1['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>"><img src="<?php echo $row_Rs1[$image_field];?>" width="128" height="85" border="0" style="margin:13px 0px 4px 0px;text-align:center;" /><?php } else echo '<img src="images/default01.jpg" width="128" height="85" border="0" style="margin:13px 0px 4px 0px;text-align:center;" >'?></a>    
                                    
                                    </td>
                                </tr>
                                <tr>
                                  <td align="center" valign="top"><table width="100%" border="0" cellspacing="6" cellpadding="0">
                                    
                                    
                                    <tr>
                                      <td align="left" valign="top">
<div style=" position:relative; margin:0;">
<?
	$field_listing_query = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE field_status=1 $section_query and field_type!='file' and field_type!='position' and (field_display=1 or field_display=3) order by field_position asc ");
	$field_listing = mysqli_fetch_assoc($field_listing_query);	


$class = array('heading4','title7','title7','title7','heading'); // Class apply to the text
$position_y = array('-1px','32px','55px','63px','88px',); // Y position range from top, higher value lower position
$character_limit = array('36','20','22','28','22',); // text will be truncated when over limit


$array_no=0;


do{
	$field_name =$field_listing['table_field'];
?>
                                     
    <div style="position:absolute; width:90%; margin:0px 10px 0px 10px; top:<?php echo $position_y[$array_no]?>;" class="<?php echo $class[$array_no]?>">
   		<?php if($row_Rs1[$field_name]!=''){?>
		<?php if($field_listing['field_type']=='file02'){?>
            <div style="text-align:right; width:100%;" class="heading3">
                <strong><a href="<?php echo $selected[$field_name]?>" target="_blank">PDF</a></strong>
            </div>
        <?php }else{?>
		<strong>
		<a href="result.php?root=<?php echo $root?>&detail=<?php echo base64_encode($row_Rs1['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>">
		<?php if($field_listing['field_type']=='price'){ echo "<span style=\"font-size:10px;\">From</span> ".$field_listing['price_currency']; }?><?php $content01 = str_replace("../../photo/","photo/",$row_Rs1[$field_name])." ";
		echo substr( $content01, 0,strrpos( substr($content01, 0, $character_limit[$array_no]), ' ' ));
		if(strlen($content01)>$character_limit[$array_no])echo "..";?><?php if($field_listing['field_type']=='price'){ /*echo "<span style=\"font-size:10px;\">&nbsp;&nbsp;".$field_listing['price_note'];*/ }?></a>
		</strong>
        <?php }?>
        <?php }?>
	</div><br />
<?php $array_no++;}while($field_listing = mysqli_fetch_assoc($field_listing_query));?>                   
</div>                    
                    
                    </td>
                                      </tr>
                                    
                                                                         
                                    </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          </td>
         
<?php if($count==2){?></tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
<?php $count=0;}else{$count++;}}while($row_Rs1 = mysqli_fetch_assoc($Rs1));} else echo '<span class="content_text6">No item posted at the moment</span>'?>
    <tr>
    <td>&nbsp;</td>
  </tr>




</table>

    
    
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="images/line_h.gif"><img src="images/space.gif" width="200" height="3" /></td>
      </tr>
    </table>
        <img src="images/space.gif" width="100" height="6" /></td></tr>
    </table>
    <?php include("paging.php");?>
    </td>
  </tr>
</table>
