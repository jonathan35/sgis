<?php require_once('Connections/pamconnection.php');
    
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    // you can add different browsers with the same way ..
    if(preg_match('/(chromium)[ \/]([\w.]+)/', $ua))
            $browser = 'chromium';
    elseif(preg_match('/(chrome)[ \/]([\w.]+)/', $ua))
            $browser = 'chrome';
    elseif(preg_match('/(safari)[ \/]([\w.]+)/', $ua))
            $browser = 'safari';
    elseif(preg_match('/(opera)[ \/]([\w.]+)/', $ua))
            $browser = 'opera';
    elseif(preg_match('/(msie)[ \/]([\w.]+)/', $ua))
            $browser = 'ie';
    elseif(preg_match('/(mozilla)[ \/]([\w.]+)/', $ua))
            $browser = 'mozilla';

    preg_match('/('.$browser.')[ \/]([\w]+)/', $ua, $version);

    $browser = array('name'=>$browser,'version'=>$version[2]);//array($browser,$version[2], 'name'=>$browser,'version'=>$version[2]);


/*
Note
This page have 3 name of $_GET to send out the value, which as below:
1. root  -- root section
2. main  -- first category
3. sub  -- second category
4. id  -- page id for dynamic Tiny page only
All this value will send to result.php to be filter and retreive the correct page, either is pre-design page or dynamic(Tiny) page.
*/


	@$hrzt_currentFile = $hrzt__SERVER["PHP_SELF"];
	$hrzt_parts = Explode('/', $hrzt_currentFile);
	$hrzt_url = $hrzt_parts[count($hrzt_parts) - 1];
			
			$hrzt_category_query=mysqli_query($conn, "select * from murum_section where status=1 and length(position)=1 and showing='true' order by position asc, maincat_name asc");
			$hrzt_category_set =mysqli_fetch_assoc($hrzt_category_query); 
			$hrzt_idth_query=mysqli_query($conn, "select * from murum_section where status=1 order by position asc, maincat_name asc");
			$hrzt_count_width_set=mysqli_fetch_assoc($hrzt_idth_query); 
			if($hrzt_category_set!=''){

?>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<?php if($browser['name'] == 'ie'){ ?>
<link href="SpryAssets/SpryMenu_ie.css" rel="stylesheet" type="text/css" />
<?php }else{ ?>
<link href="SpryAssets/SpryMenu_default.css" rel="stylesheet" type="text/css" />
<?php }?>
<?
	$hrzt_switch_of_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=17");
	$hrzt_switch_of_menu_set=mysqli_fetch_assoc($hrzt_switch_of_menu_query);
	$hrzt_width_of_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=18");
	$hrzt_width_of_menu_set=mysqli_fetch_assoc($hrzt_width_of_menu_query);
	$hrzt_text_size_menu_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=19");
	$hrzt_text_size_menu_set=mysqli_fetch_assoc($hrzt_text_size_menu_query);
	$hrzt_character_limit_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=20");
	$hrzt_character_limit_set=mysqli_fetch_assoc($hrzt_character_limit_query);
	
	$menu_background = "; background:url(images/n05c.png)";

?>
<?php if($hrzt_switch_of_menu_set['record']=='1'){?>

<style>

.hover_color_white:hover{
	color:#FFF !important;
}

</style>


<table width="<?php echo $width_of_menu_set['record'];?>" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" >

<ul id="MenuBar1" class="MenuBarHorizontal">

<li class="content_text9" style="width:auto; margin:0; padding:0;">
<?		  
	  
		$left_bg = 'images/n05.png';
		$middle_bg = 'images/n05c.png';
		$right_bg = 'images/n05b.png';
		$hover_color = false;
	  
	
		if(!empty($_GET['root'])){
			if(base64_decode($_GET['root']) == $hrzt_category_set['maincat_id']){
				$left_bg = 'images/n01.png';
				$middle_bg = 'images/n01c.png';
				$right_bg = 'images/n01b.png';
				$hover_color = true;
			} 
		}




?>
  
  <a href="index.php" class="MenuBarItemSubmenu" style="top:0;"><div style="float:left; float:left;"><img src="<?=$left_bg?>" width="9" height="30" border="0"></div><div style="float:left; width:auto; height:24px; font-size:14px; font-weight:bold; background:url(<?=$middle_bg?>); padding:6px 18px 0 18px;">Home</div><div style="float:left; width:9px;"><img src="<?=$right_bg?>" width="9" height="30" border="0"></div>
  </a>
</li>                    


<?
do{
	
	
if(strlen($hrzt_category_set['position'])==1){ 

$hrzt_previous_code2 = $hrzt_category_set['position'];
$hrzt_next_position_len2 = 2;
$hrzt_category_query02=mysqli_query($conn, "SELECT * FROM murum_section WHERE status=1 and position like '".$hrzt_previous_code2."%' and length(position)=2 and status=1 ORDER BY position ASC, maincat_name ASC");
$hrzt_category_set02=mysqli_fetch_assoc($hrzt_category_query02);

$hrzt_item_query=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$hrzt_category_set['maincat_id']."|%' and maincat_id!='' and status=1 order by position asc, product_name asc ");
$hrzt_item_set=mysqli_fetch_assoc($hrzt_item_query);


//////This part is customize to fix TLS menu look & feel problem only, may bot applicable for others project.//////start here//////
if($hrzt_category_set['url_file']=="news.php"||$hrzt_category_set['url_file']=="gallery.php") 
	$extra_right_margin = 41; 
else 
	$extra_right_margin = 0;

//$firstcat_width = strlen($hrzt_category_set['maincat_name'])*5+50;

//$left_margin = 10+$extra_right_margin;
//$right_margin = 2+$extra_right_margin;

//////This part is customize to fix TLS menu look & feel problem only, may bot applicable for others project.//////end here//////



	

?>



 
  <li class="content_text9" style="width:auto; margin:0; padding:0;">
  <?php if($hrzt_category_set['section_type']==2){
	  

	  
	  ?>
  
  <a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>" <?php if($hrzt_category_set02!=''){?><?php }?>class="MenuBarItemSubmenu" style="font-size:<?php echo $hrzt_text_size_menu_set['record']?>px; padding:0 0 0 0 !important; top:0; " <?php if($hover_color == true){?>class="hover_color_white"<?php }?>><?php }else{?><a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>" <?php if($hrzt_category_set02!=''){?>class="MenuBarItemSubmenu"<?php }?> style=" font-size:<?php echo $hrzt_text_size_menu_set['record']?>px; top:0;" <?php if($hover_color == true){?>class="hover_color_white"<?php }?>><?php }?>
  <div style="float:left; width:10px; height:30px; float:left;background:url(<?= $left_bg?>);">&nbsp;</div>
  <div style="float:left; width:auto; height:24px; font-size:14px; font-weight:bold; background:url(<?=$middle_bg?>); padding:6px 21px 0 20px;"><?php 
   
	  $hrzt_content01 = $hrzt_category_set['maincat_name']." ";
					echo substr( $hrzt_content01, 0,strrpos( substr( $hrzt_content01, 0, $hrzt_character_limit_set['record']), ' ' ));
					if(strlen($hrzt_content01)>$hrzt_character_limit_set['record'])echo "..";?></div><div style="float:left; width:9px;"><img src="<?=$right_bg?>" width="9" height="30" border="0"></div></a>
                    
                    
  
  
<?
if($hrzt_category_set02!='' || $hrzt_item_set!=''){
?>
    <ul style="width:<?php echo $hrzt_width_of_menu_set['record']."px"; echo $menu_background;?>;" class="ul_top">
      <?php 
	if($hrzt_category_set02!=''){
	do{

		
		?>
       
      <li class="content_text9"><!-- style="background-image:url(images/bg_panel.jpg);" -->
      <?php if($hrzt_category_set['section_type']==2){?>
      <a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>&main=<?php echo base64_encode($hrzt_category_set02['maincat_id'])?>" class="MenuBarItemSubmenu"  style="font-size:<?php echo $hrzt_text_size_menu_set['record']?>px; top:0;">
	  <?php }else{?>
      
      <a style="font-size:<?php echo $hrzt_text_size_menu_set['record']?>px;"><?php }?><?php 
	  $hrzt_content02 = $hrzt_category_set02['maincat_name']." ";
					echo substr( $hrzt_content02, 0,strrpos( substr( $hrzt_content02, 0, $hrzt_character_limit_set['record']), ' ' ));
					if(strlen($hrzt_content02)>$hrzt_character_limit_set['record'])echo "..";?></a>
      


        <?
		$hrzt_level3_query=mysqli_query($conn, "SELECT * FROM murum_section WHERE position like '".$hrzt_category_set02['position']."%' and position!='".$hrzt_category_set02['position']."' and length(position)>=3 and status=1 ORDER BY position ASC, maincat_name ASC");
		$hrzt_level3_set=mysqli_fetch_assoc($hrzt_level3_query);
		
		
		if($hrzt_level3_set!=''){?>
        <ul style="width:<?php echo $hrzt_width_of_menu_set['record']."px"; //echo $menu_background;?>">
          <?php do{
			  
		$hrzt_check_title_query = mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$hrzt_level3_set['maincat_id']."|%' and maincat_id!='' and status=1 order by position asc, product_name asc");
		$hrzt_check_title_set=mysqli_fetch_assoc($hrzt_check_title_query);
			  //if($hrzt_check_title_set!=''){
		?>
          <li class="content_text9"><a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>&main=<?php echo base64_encode($hrzt_category_set02['maincat_id'])?>&sub=<?php echo base64_encode($hrzt_level3_set['maincat_id'])?>" style="font-size:<?php echo $text_size_menu_set['record']?>px; top:0;">
            <?php $hrzt_content03 = $hrzt_level3_set['maincat_name']." ";
					echo substr( $hrzt_content03, 0,strrpos( substr( $hrzt_content03, 0, $hrzt_character_limit_set['record']), ' ' ));
					if(strlen($hrzt_content03)>$hrzt_character_limit_set['record'])echo "..";?></a></li>
          <?php }while($hrzt_level3_set=mysqli_fetch_assoc($hrzt_level3_query));?>
          </ul>
        <?php }
		
		if($hrzt_category_set['section_type']==1){?>
        
		
		<?php 
		$hrzt_title_query02=mysqli_query($conn, "SELECT * FROM mydf_product WHERE maincat_id like '%|".$hrzt_category_set02['maincat_id']."|%' and maincat_id!='' and status=1 order by position asc, product_name asc ");
		$hrzt_title_set02=mysqli_fetch_assoc($hrzt_title_query02);
		$hrzt_count_title_set02=mysqli_num_rows($hrzt_title_query02);
		
		if($hrzt_title_set02!=''){?>
        <ul style="width:<?php echo $hrzt_width_of_menu_set['record']."px"; echo $menu_background;?>">
          <?php do{?>
          <li class="content_text9"><a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>&id=<?php echo base64_encode($hrzt_title_set02['id'])?>&sub=<?php echo base64_encode($hrzt_category_set02['maincat_id'])?>" style="font-size:<?php echo $hrzt_text_size_menu_set['record']?>px; top:0;">
            <?php $hrzt_content04 = $hrzt_title_set02['product_name']." ";
					echo substr( $hrzt_content04, 0,strrpos( substr( $hrzt_content04, 0, $hrzt_character_limit_set['record']), ' ' ));
					if(strlen($hrzt_content04)>$hrzt_character_limit_set['record'])echo "..";?></a></li>
          <?php }while($hrzt_title_set02=mysqli_fetch_assoc($hrzt_title_query02));?>
          </ul> 
        <?php }?>
        </li>
       <?php }?>

      <?php }while($hrzt_category_set02=mysqli_fetch_assoc($hrzt_category_query02));}?>
      
      
      
      
      
      
  <!-- Retrieve Product which Linked to This section - Start-->   
  <?
if($hrzt_item_set!=''){
?>
      <?php do{?>
      <li class="content_text9" ><a href="result.php?root=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>&id=<?php echo base64_encode($hrzt_item_set['id'])?>&main=<?php echo base64_encode($hrzt_category_set['maincat_id'])?>" style="font-size:<?php echo $hrzt_text_size_menu_set['record']?>px; top:0;"><?php $hrzt_content05 = $hrzt_item_set['product_name']." ";
					echo substr( $hrzt_content05, 0,strrpos( substr($hrzt_content05, 0, $hrzt_character_limit_set['record']), ' ' ));
					if(strlen($hrzt_content05)>$hrzt_character_limit_set['record'])echo "..";?></a></li>
      <?php }while($hrzt_item_set=mysqli_fetch_assoc($hrzt_item_query));}?>
  <!-- Retrieve Product which Linked to This section - End-->
      </ul>
    <?php }?></li>
  <?php }}while($hrzt_category_set=mysqli_fetch_assoc($hrzt_category_query));//}else{?>
  
  
  
  <?php }?>
  
  
</ul>
</td>
<tr>
</table>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>

<?php }?>                
                      
                      
                      
