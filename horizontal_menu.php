<?php require_once('Connections/pamconnection.php');

	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$url = $parts[count($parts) - 1];

			
			$category_query=mysqli_query($conn, "select * from murum_section where status=1 order by position asc, maincat_name asc");
			$category_set=mysqli_fetch_assoc($category_query); 
			$idth_query=mysqli_query($conn, "select * from murum_section where status=1 order by position asc, maincat_name asc");
			$count_width_set=mysqli_fetch_assoc($idth_query); 
			if($category_set!=''){
            
            //$home_page = "index.php";
			
			
			do{
				$str_lengh = strlen($count_width_set['maincat_name']);
				$sub_width = (6 * $str_lenght)+50;
				$total_width+=$sub_width;
				$asdsd+=18;
			}while($count_width_set=mysqli_fetch_assoc($idth_query));
			$balance_width = (920 - $total_width)-116 -$asdsd; //echo $balance_width;


?>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="css.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/bg_running.jpg">
  <tr>
    <td>

<ul id="MenuBar1" class="MenuBarHorizontal">

	<li style="width:12px;">&nbsp;</li>
    
	<li style="width:116px;">
    <a href="#" onClick="MM_openBrWindow('feedback.php','Feedback','scrollbars=yes,resizable=yes,width=550,height=630')" onMouseOver="MM_swapImage('nav_feedback','','images/feedback_02.gif',1)" onMouseOut="MM_swapImgRestore()" style="margin:0; padding:0;"><img src="images/feedback_01.gif" name="nav_feedback" width="116" height="30" border="0" id="nav_feedback"/></a>
    </li>
     <li style="width:22px;"><a style="margin:0; padding:0; cursor:default; height:28px;"><img src="images/line_nav.gif" width="22" height="30" /></a></li>

<?
do{

$category_query02=mysqli_query($conn, "SELECT * FROM murum_category WHERE status=1 and maincat_id='".$category_set['maincat_id']."' and status=1 ORDER BY position ASC, subcat_name ASC");
$category_set02=mysqli_fetch_assoc($category_query02);

$item_query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$category_set['maincat_id']."|%' and maincat_id!='' and status=1");
$item_set=mysqli_fetch_assoc($item_query);

if($category_set02!='' || $item_set!=''){ $extra_width=35;}else{ $extra_width=28;}
$str_lenght = strlen($category_set['maincat_name']);
$width = (6.7 * $str_lenght)+$extra_width;


?>  
  <li style="width:<?php echo $width."px";?>;"><a <?php if($category_set02!=''){?>class="MenuBarItemSubmenu"<?php }?>><span class="running_text"><?php echo $category_set['maincat_name']; ?></span></a>
<?
if($category_set02!='' || $item_set!=''){
?>
    <ul style="width:<?php echo ($width+60)."px";?>;">
	<?php 
	if($category_set02!=''){
	do{
		$title_query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE category_id like '%|".$category_set02['subcat_id']."|%' and category_id!='' and status=1");
		$title_set=mysqli_fetch_assoc($title_query);	
		$count_title_set=mysqli_num_rows($title_query);	
			
		?>    
      <li style="width:<?php echo ($width+60)."px";?>;"><span class="running_text"><a class="MenuBarItemSubmenu" ><?php echo $category_set02['subcat_name'];?></a></span>
      	<?php if($title_set!=''){?>
        <ul style="width:<?php echo ($width+60)."px";?>;">
        <?php do{?>
          <li style="width:<?php echo ($width+60)."px";?>;"><a href="result.php?id=<?php echo base64_encode($title_set['id'])?>&sub=<?php echo base64_encode($category_set02['subcat_id'])?>">
		  <span class="running_text"><?php echo $title_set['product_name']?></span></a></li>
        <?php }while($title_set=mysqli_fetch_assoc($title_query));?>
        </ul> 
        <?php }?>
      </li>
      
	<?php }while($category_set02=mysqli_fetch_assoc($category_query02));}?>
    
    
<!-- Retrieve Product which Linked to This section - Start-->   
<?
if($item_set!=''){
?>
	<?php do{?>
      <li style="width:<?php echo ($width+60)."px";?>;"><a href="result.php?id=<?php echo base64_encode($item_set['id'])?>&main=<?php echo base64_encode($category_set['maincat_id'])?>"><span class="running_text"><?php echo $item_set['product_name'];?></span></a></li>
	<?php }while($item_set=mysqli_fetch_assoc($item_query));}?>
<!-- Retrieve Product which Linked to This section - End-->
    </ul>
    <?php }?></li>
  <li style="width:22px; margin:0; padding:0; height:20px;"><a style="margin:0; padding:0; cursor:default; height:28px;"><img src="images/line_nav.gif" width="22" height="30" style="margin:0;" /></a></li>
  
<?php }while($category_set=mysqli_fetch_assoc($category_query));}?>


</ul>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
	</td>
  </tr>
</table>