<?php require_once('Connections/pamconnection.php');

/*
Note
This page have 3 name of $_GET to send out the value, which as below:
1. root  -- root section
2. main  -- first category
3. sub  -- second category
4. id  -- page id for dynamic Tiny page only
All this value will send to result.php to be filter and retreive the correct page, either is pre-design page or dynamic(Tiny) page.
*/


	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$url = $parts[count($parts) - 1];
	
		$get_section = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
	
		if($get_section!="")
		{	
			$rootcat_query = mysqli_query($conn, "select * from murum_section where status=1 and length(position)=1 and maincat_id='".$get_section."'");
			$rootcat_set = mysqli_fetch_assoc($rootcat_query);
		}	
	
			if($rootcat_set!=''){
			$category_query=mysqli_query($conn, "select * from murum_section where status=1 and length(position)=2 and position like '".$rootcat_set['position']."%' order by position asc, maincat_name asc");
			$category_set=mysqli_fetch_assoc($category_query); 
			}
			//if($category_set!=''){
			//	echo "subcat is not empty!";
			//}else{
			//	echo "subcat is empty!";
			//}
			
			$idth_query=mysqli_query($conn, "select * from murum_section where status=1 order by position asc, maincat_name asc");
			$count_width_set=mysqli_fetch_assoc($idth_query); 
			//if($category_set!=''){

?>

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



<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

<?
	$switch_of_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=8");
	$switch_of_menu_set=mysqli_fetch_assoc($switch_of_menu_query);
	$width_of_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=9");
	$width_of_menu_set=mysqli_fetch_assoc($width_of_menu_query);
	$text_size_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=10");
	$text_size_menu_set=mysqli_fetch_assoc($text_size_menu_query);
	$character_limit_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=11");
	$character_limit_set=mysqli_fetch_assoc($character_limit_query);

	$menu_background = "; background:url(images/bg_panel.gif)";

?>
<table width="<?php echo $width_of_menu_set['record'];?>" border="0" cellspacing="0" cellpadding="0" >

  <tr >
     
    <td align="left" valign="top" >
    <div style="position:relative; height:0px; width:0px; top:-50px;"><a name="result" id="result"></a></div>

    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><!--<div align="right"></span> -->
            
       
<ul id="MenuBar3" class="MenuBarVertical" style="width:<?php echo $width_of_menu_set['record']."px";?>">
  <!--<li><a href="index.php"><span class="">Home</span></a></li> -->

<?php 
if($category_set!=''){
do{

$previous_code2 = $category_set['position'];
$next_position_len2 = 2;
$category_query02=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$previous_code2."%' and length(position)=3 and status=1 ORDER BY position ASC, maincat_name ASC");
$category_set02=mysqli_fetch_assoc($category_query02);

$item_query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$get_section."|%' and maincat_id!='' and status=1 order by position asc, product_name asc ");
$item_set=mysqli_fetch_assoc($item_query);

?>
<div style="position:relative; float:left; width:100%">
  <li class="content_text8">
  <a href="result.php?root=<?=$_GET['root']?>&main=<?php echo base64_encode($category_set['maincat_id'])?>" <?php if($category_set02!=''){?>class="MenuBarItemSubmenu"<?php }?> style="font-size:<?php echo $text_size_menu_set['record']?>px;">
  
 <?php 
	  $content01 = $category_set['maincat_name']." ";
					echo substr( $content01, 0,strrpos( substr( $content01, 0, $character_limit_set['record']), ' ' ));
					if(strlen($content01)>$character_limit_set['record'])echo "..";?></a>
<?
if($category_set02!='' || $item_set!=''){
?>
    <ul style="width:<?php echo $width_of_menu_set['record']."px";echo $menu_background;?>">
      <?php 
	if($category_set02!=''){
	do{

		
		?>
      
      <li class="content_text8">
      <a href="result.php?root=<?=$_GET['root']?>&main=<?php echo base64_encode($category_set['maincat_id'])?>&main=<?php echo base64_encode($category_set02['maincat_id'])?>" class="MenuBarItemSubmenu"  style="font-size:<?php echo $text_size_menu_set['record']?>px;">
      <?php /*if($category_set['section_type']==2){?>
      <a href="result.php?root=<?=$_GET['root']?>&main=<?=$root_set['maincat_id']?>&main=<?php echo base64_encode($category_set['maincat_id'])?>&main=<?php echo base64_encode($category_set02['maincat_id'])?>" class="MenuBarItemSubmenu"  style="font-size:<?php echo $text_size_menu_set['record']?>px;"><?php }else{?><a style="font-size:<?php echo $text_size_menu_set['record']?>px;"><?php }*/?><?php 
	  $content02 = $category_set02['maincat_name']." ";
					echo substr( $content02, 0,strrpos( substr( $content02, 0, $character_limit_set['record']), ' ' ));
					if(strlen($content02)>$character_limit_set['record'])echo "..";?></a>

        <?
		
		
		
		if($category_set['section_type']==1){?>
        
		
		<?php 
		$title_query02=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$category_set02['maincat_id']."|%' and maincat_id!='' and status=1 order by position asc, product_name asc ");
		$title_set02=mysqli_fetch_assoc($title_query02);
		$count_title_set02=mysqli_num_rows($title_query02);
		
		if($title_set02!=''){?>
        <ul style="width:<?php echo $width_of_menu_set['record']."px";echo $menu_background;?>">
          <?php do{?>
          <li class="content_text8"><a href="result.php?root=<?=$_GET['root']?>&main=<?php echo base64_encode($category_set['maincat_id'])?>&main=<?php echo base64_encode($category_set02['maincat_id'])?>&id=<?php echo base64_encode($title_set02['id'])?>" style="font-size:<?php echo $text_size_menu_set['record']?>px;">
            <?php $content04 = $title_set02['product_name']." ";
					echo substr( $content04, 0,strrpos( substr( $content04, 0, $character_limit_set['record']), ' ' ));
					if(strlen($content04)>$character_limit_set['record'])echo "..";?></a></li>
          <?php }while($title_set02=mysqli_fetch_assoc($title_query02));?>
          </ul> 
        <?php }?>
        </li>
       <?php }?>

      <?php }while($category_set02=mysqli_fetch_assoc($category_query02));}?>
      
      
      
      
      
      
  <!-- Retrieve Product which Linked to This section - Start-->   
  <?
if($item_set!=''){
?>
      <?php do{?>
      <li class="content_text8" style="background-color:#FFF;"><a href="result.php?root=<?=$_GET['root']?>&main=<?php echo base64_encode($category_set['maincat_id'])?>&id=<?php echo base64_encode($item_set['id'])?>" style="font-size:<?php echo $text_size_menu_set['record']?>px;"><?php $content05 = $item_set['product_name']." ";
					echo substr( $content05, 0,strrpos( substr($content05, 0, $character_limit_set['record']), ' ' ));
					if(strlen($content05)>$character_limit_set['record'])echo "..";?></a></li>
      <?php }while($item_set=mysqli_fetch_assoc($item_query));}?>
  <!-- Retrieve Product which Linked to This section - End-->
      </ul>
    <?php }?></li>
    </div>
    <div style="position:relative; float:left; width:100%; height:2px; background:url(images/line_h02.gif); background-repeat:no-repeat;"></div>
  
  
  <?php }while($category_set=mysqli_fetch_assoc($category_query));?>
  
  
</ul>





<?php }else{
//Select product if no sub category is not available.
				
				if($rootcat_set['url_file']==''){
					$page_query=mysqli_query($conn, "select * from mydf_product where maincat_id like '%|".$rootcat_set['maincat_id']."|%' and maincat_id!='' and status=1 order by position asc, product_name asc");
					$page_set=mysqli_fetch_assoc($page_query); 
					$parameter = 'id';
				}elseif($rootcat_set['url_file']=='gallery.php'){
					$page_query=mysqli_query($conn, "select * from album where status=1 order by position asc, album_id desc");
					$page_set=mysqli_fetch_assoc($page_query); 
					$parameter = 'mcat';
				}elseif($rootcat_set['url_file']=='product.php'){
					$page_query=mysqli_query($conn, "select * from product_section where status=1 and category like '%|".$rootcat_set['maincat_id']."|%' order by position asc, name asc, id desc");
					
					$page_set=mysqli_fetch_assoc($page_query); 
					$parameter = 'detail';
				}elseif($rootcat_set['url_file']=='document.php'){

					$page_query=mysqli_query($conn, "select * from file_upload where status=1 and category like '%|".$rootcat_set['maincat_id']."|%' order by file_id desc");
					$page_set=mysqli_fetch_assoc($page_query); 	
					$parameter = 'detail';					
					
				}elseif($rootcat_set['url_file']=='news.php'){
					$page_query=mysqli_query($conn, "select * from events where status=1 order by date desc");
					$page_set=mysqli_fetch_assoc($page_query); 
					$parameter = 'detail';
				}elseif($rootcat_set['url_file']=='calendar.php'){
					//if calendar module apply, instead using while looping by mysqli_fetch_assoc, it will use for looping by month
				}
				
if($rootcat_set['url_file']=='calendar.php'){
	$year = date("Y");
	if($year==2011)
	$year_start = 8;
	else
	$year_start = 1;
	for($m=$year_start; $m<=12; $m++){
	?>

<div style="position:relative; float:left; width:100%">
  <li class="content_text8">
  <a href="result.php?root=<?php echo base64_encode($rootcat_set['maincat_id'])?>&month=<?=$m?>&year=<?=$year?>#result" style="font-size:<?php echo $text_size_menu_set['record']?>px;">
 <?php echo $month_name = date( 'F', mktime(0, 0, 0, $m) )." ".$year;?></a>
</li>
    </div>
    <div style="position:relative; float:left; width:100%; height:2px; background:url(images/line_h02.gif); background-repeat:no-repeat;"></div>

	
<?	
	}

}else{

if($page_set!=''){	
do{
				if($rootcat_set['url_file']==''){
					$product_name = $page_set['product_name'];
					$page_id = $page_set['id'];
				}elseif($rootcat_set['url_file']=='gallery.php'){
					$product_name = $page_set['album_name'];
					$page_id = $page_set['album_id'];
				}elseif($rootcat_set['url_file']=='product.php'){
					$product_name = $page_set['name'];
					$page_id = $page_set['id'];
				}elseif($rootcat_set['url_file']=='news.php'){
					$product_name = $page_set['name'];
					$page_id = $page_set['id'];
				}elseif($rootcat_set['url_file']=='document.php'){
					$product_name = $page_set['subject'];
					$page_id = $page_set['file_id'];

				}						
	
?>
<div style="position:relative; float:left; width:100%">
  <li class="content_text8">
  <a href="result.php?root=<?php echo base64_encode($rootcat_set['maincat_id'])?>&<?=$parameter?>=<?php echo base64_encode($page_id)?>" style="font-size:<?php echo $text_size_menu_set['record']?>px;">
 <?php 
	  $content01 = $product_name." ";
					echo substr( $content01, 0,strrpos( substr( $content01, 0, $character_limit_set['record']), ' ' ));
					if(strlen($content01)>$character_limit_set['record'])echo "..";?></a>
</li>
    </div>
    <div style="position:relative; float:left; width:100%; height:2px; background:url(images/line_h02.gif); background-repeat:no-repeat;"></div>
  
  
  <?php }while($page_set=mysqli_fetch_assoc($page_query));?>
  <?php }?>
  <?php }?>
  <?php }?>
</ul>


<?php //}?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>


<?php //}?>
