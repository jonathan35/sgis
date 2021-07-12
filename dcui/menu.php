<?php 
$arr=explode('/', $_SERVER['REQUEST_URI']);
?>
<?php 
$arr=explode('/', $_SERVER['REQUEST_URI']);

if (preg_match("/opera/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "opera";
} else if (preg_match("/gecko/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "gecko";
} else if (preg_match("/msie.[4|5|6|7|8]/i",$_SERVER["HTTP_USER_AGENT"])) {
    $browser = "ie";
} else if (preg_match("/nav/i",$_SERVER["HTTP_USER_AGENT"]) ||
preg_match("/Mozilla\/5\./", $_SERVER["HTTP_USER_AGENT"])) {
    $browser = "netscape";
} else {
    $browser = "other";
}
	


?>
	<?

    if($_GET['m']!=''){
		
		$_SESSION['current_section'] = base64_decode($_GET['m']);
	}
	?>


<title>DCUI</title>

<div id="menu">
  <div align="left">
	<ul>
	  <li> 
	  <a href="../authentication/admin_main.php" class="<?php if($arr[count($arr)-1]=='admin_main.php') { ?>current<?php }?>"><img src="../images/arrow.gif" width="10" height="10" border="0"><span class="main_title">Main Page</span></a> 
	  </li>
	</ul>
  </div>
</div>


<?php if(($arr[count($arr)-1]=='editTitle.php')||
($arr[count($arr)-1]=='editTitle.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editTemplate.php')||
($arr[count($arr)-1]=='editTemplate.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editMenu.php')||
($arr[count($arr)-1]=='editMenu.php?'.$_SERVER['QUERY_STRING'])) 
{ $template='current'; $templatestyle='block'; }
else
{$template=''; $templatestyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $template;?>" onClick="return kadabra('template',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title">Graphic Interface</span></a>
			  <ul id="template" style="display:<?php echo $templatestyle;?>">
			 	<li><a class="<?php 
				if(($arr[count($arr)-1]=='editTitle.php')||
				($arr[count($arr)-1]=='editTitle.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_template/editTitle.php"><span class="content">Overall Title</span></a>
				</li>
                
                <li><a class="<?php 
				if(($arr[count($arr)-1]=='editTemplate.php')||
				($arr[count($arr)-1]=='editTemplate.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_template/editTemplate.php"><span class="content">Template</span></a>
				</li>
                	<li><a class="<?php 
				if(($arr[count($arr)-1]=='editMenu.php')||
				($arr[count($arr)-1]=='editMenu.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_template/editMenu.php"><span class="content">Menu</span></a>
				</li>
                
                
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
</div>
</div>


<?php 
if(($arr[count($arr)-1]=='createCategory.php')||
($arr[count($arr)-1]=='createCategory.php?'.$_SERVER['QUERY_STRING'])) 
{ $cat='current'; $catstyle='block'; }
else
{$cat=''; $catstyle='none';}
?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $cat;?>" onClick="return kadabra('tour',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Section</span></a>
			  <ul id="tour" style="display:<?php echo $catstyle;?>">
              
                <li><a class="<?php 
				if(($arr[count($arr)-1]=='createCategory.php')||
				($arr[count($arr)-1]=='createCategory.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_dynamic_page/createCategory.php"><span class="content">Manage Section</span></a>
				</li>
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>			

<?php 

	$custom_field_section_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE 
											  length(position)=1 and status=1 and url_file='custom_field.php' order by position asc");
	$custom_field_set = mysqli_fetch_assoc($custom_field_section_query);

if(($arr[count($arr)-1]=='createfield.php')||
($arr[count($arr)-1]=='createfield.php?'.$_SERVER['QUERY_STRING'])) 
{ $field_creator='current'; $field_creatorstyle='block'; }
else
{$field_creator=''; $field_creatorstyle='none';}
?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $field_creator;?>" onClick="return kadabra('field_creator',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Field Creator</span></a>
			  <ul id="field_creator" style="display:<?php echo $field_creatorstyle;?>">
              <?php do{?>
				<li><a class="<?php 
				if(($arr[count($arr)-1]=='createfield.php')||
				($arr[count($arr)-1]=='createfield.php?'.$_SERVER['QUERY_STRING'])&&$_SESSION['current_section']==$custom_field_set['maincat_id']) { ?>current<?php }?>" href="../dcui_field_creator/createfield.php?m=<?php echo base64_encode($custom_field_set['maincat_id'])?>"><span class="content"><?php echo $custom_field_set['maincat_name']?></span></a>
				</li>
                <?php }while($custom_field_set = mysqli_fetch_assoc($custom_field_section_query));?>
                
               
                
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>		

<?php if(($arr[count($arr)-1]=='editComponent.php')|| 
($arr[count($arr)-1]=='editComponent.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editSide.php?'.$_SERVER['QUERY_STRING'])|| 
($arr[count($arr)-1]=='manageSide.php')|| 
($arr[count($arr)-1]=='manageSide.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='managebtmSide.php')|| 
($arr[count($arr)-1]=='managebtmSide.php?'.$_SERVER['QUERY_STRING'])) 
{ $component='current'; $componentstyle='block'; }
else
{$component=''; $componentstyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $component;?>" onClick="return kadabra('component',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Pre-design Setting</span></a>
			  <ul id="component" style="display:<?php echo $componentstyle;?>">
                    <li><a class="<?php 
				if(($arr[count($arr)-1]=='editComponent.php')||
				($arr[count($arr)-1]=='editComponent.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_component/editComponent.php"><span class="content">Product</span></a>
                </li>            
              <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageSide.php')||
				($arr[count($arr)-1]=='manageSide.php?'.$_SERVER['QUERY_STRING']) ||($arr[count($arr)-1]=='editSide.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_component/manageSide.php"><span class="content"> Others <span class="red02">(Pending)</span></span></a></li>	
            <li><a class="<?php 
				if(($arr[count($arr)-1]=='managebtmSide.php')||
				($arr[count($arr)-1]=='managebtmSide.php?'.$_SERVER['QUERY_STRING']) ||($arr[count($arr)-1]=='editbtmSide.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_component/managebtmSide.php"><span class="content"> Others <span class="red02">(Pending)</span></span></a></li>	
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>

<?php 
if(($arr[count($arr)-1]=='manageFreeFormatPage.php')||
($arr[count($arr)-1]=='manageFreeFormatPage.php?'.$_SERVER['QUERY_STRING'])) 
{ $freeFormatPage='current'; $freeFormatPagestyle='block'; }
else
{$freeFormatPage=''; $freeFormatPagestyle='none';}
?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $freeFormatPage;?>" onClick="return kadabra('freeFormatPage',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Free Format Setting</span></a>
			  <ul id="freeFormatPage" style="display:<?php echo $freeFormatPagestyle;?>">
              
                <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageFreeFormatPage.php')||
				($arr[count($arr)-1]=='manageFreeFormatPage.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dcui_dynamic_page/manageFreeFormatPage.php"><span class="content">Manage Section</span></a>
				</li>
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>			



<!---START FROM HERE, THE SOURCE CODE FORM CMS --->

<?php if(($arr[count($arr)-1]=='change_password.php')||($arr[count($arr)-1]=='change_password.php?'.$_SERVER['QUERY_STRING'])) 
{ $password='current'; $style='block'; }
else
{$password=''; $style='none';}?>
<div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $password;?>" onClick="return kadabra('myAccount1',this);"><img src="../images/menu_open.gif" width="10" height="10" /> <span class="main_title">Password</span></a>
			  <ul id="myAccount1" style="display:<?php echo $style;?>">
				<li>
				<a href="../authentication/change_password.php" class="<?php echo $password;?>"><span class="content">Change Password</span></a>
				</li>
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
</div>





<?php if(($arr[count($arr)-1]=='postBanner.php')||
($arr[count($arr)-1]=='postBanner.php?'.$_SERVER['QUERY_STRING'])) 
{ $product='current'; $productstyle='block'; }
else
{$product=''; $productstyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
			<li> <a href="#" class="<?php echo $product;?>" onClick="return kadabra('productid',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Banner Manager </span></a>
			  <ul id="productid" style="display:<?php echo $productstyle;?>">
		
			<li><a class="<?php 
			if(($arr[count($arr)-1]=='postBanner.php')||
			($arr[count($arr)-1]=='postBanner.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../banner/postBanner.php"><span class="content">Manage Banners </span></a></li>
         
		  	</ul>
		   </li>
           
		</ul>
	</div>
   </div>
</div>
</div>


<?php if(($arr[count($arr)-1]=='createText.php')||
($arr[count($arr)-1]=='createText.php?'.$_SERVER['QUERY_STRING'])) 
{ $text='current'; $textstyle='block'; }
else
{$text=''; $textstyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
			<li> <a href="#" class="<?php echo $text;?>" onClick="return kadabra('tex',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Running Text </span></a>
			  <ul id="tex" style="display:<?php echo $textstyle;?>">
			<li><a class="<?php 
			if(($arr[count($arr)-1]=='createText.php')||
			($arr[count($arr)-1]=='createText.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../runingText/createText.php"><span class="content">Manage Running Text </span></a></li>
		  	</ul>
		   </li>
		</ul>
	</div>
   </div>
</div>
</div>




<?php if(($arr[count($arr)-1]=='postPhoto.php')||
($arr[count($arr)-1]=='postPhoto.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='createProduct.php')|| 
($arr[count($arr)-1]=='createProduct.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editProduct.php?'.$_SERVER['QUERY_STRING'])|| 
($arr[count($arr)-1]=='manageProduct.php')|| 
($arr[count($arr)-1]=='manageProduct.php?'.$_SERVER['QUERY_STRING'])) 
{ $product='current'; $productstyle='block'; }
else
{$product=''; $productstyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $product;?>" onClick="return kadabra('product',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Free Format Page <img src="../images/tiny_edit.png"  style="border:0; vertical-align:middle" title="Pre-Design"></span></a>
			  <ul id="product" style="display:<?php echo $productstyle;?>">
                    <li><a class="<?php 
				if(($arr[count($arr)-1]=='createProduct.php')||
				($arr[count($arr)-1]=='createProduct.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dynamic_page/createProduct.php"><span class="content">Add File</span></a>				</li>            
              <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageProduct.php')||
				($arr[count($arr)-1]=='manageProduct.php?'.$_SERVER['QUERY_STRING']) ||($arr[count($arr)-1]=='editProduct.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../dynamic_page/manageProduct.php"><span class="content">Manage File</span></a></li>	

			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>


<?php if(($arr[count($arr)-1]=='createSide.php')|| 
($arr[count($arr)-1]=='createSide.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editSide.php?'.$_SERVER['QUERY_STRING'])|| 
($arr[count($arr)-1]=='manageSide.php')|| 
($arr[count($arr)-1]=='manageSide.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='managebtmSide.php')|| 
($arr[count($arr)-1]=='managebtmSide.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editHome.php')||
($arr[count($arr)-1]=='editHome.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editDisclaimer.php')||
($arr[count($arr)-1]=='editDisclaimer.php?'.$_SERVER['QUERY_STRING'])||
($arr[count($arr)-1]=='editIntro.php')||
($arr[count($arr)-1]=='editIntro.php?'.$_SERVER['QUERY_STRING'])) 
{ $side='current'; $sidestyle='block'; }
else
{$side=''; $sidestyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $side;?>" onClick="return kadabra('side',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> Module Panel</span> <img src="../images/tiny_edit.png"  style="border:0;vertical-align:middle" title="Pre-Design" ></a>
			  <ul id="side" style="display:<?php echo $sidestyle;?>">
                    <li><a class="<?php 
				if(($arr[count($arr)-1]=='createSide.php')||
				($arr[count($arr)-1]=='createSide.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../side/createSide.php"><span class="content">Add Side Panel</span></a>				</li>            
              <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageSide.php')||
				($arr[count($arr)-1]=='manageSide.php?'.$_SERVER['QUERY_STRING']) ||($arr[count($arr)-1]=='editSide.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../side/manageSide.php"><span class="content">Manage Side Panel</span></a>				</li>	
            <li><a class="<?php 
				if(($arr[count($arr)-1]=='managebtmSide.php')||
				($arr[count($arr)-1]=='managebtmSide.php?'.$_SERVER['QUERY_STRING']) ||($arr[count($arr)-1]=='editbtmSide.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../home/managebtmSide.php"><span class="content">Manage Bottom Panel</span></a>				</li>	

<li><a class="<?php 
				if(($arr[count($arr)-1]=='editHome.php')||
				($arr[count($arr)-1]=='editHome.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../home/editHome.php"><span class="content">Home</span></a>
				</li>
                	<li><a class="<?php 
				if(($arr[count($arr)-1]=='editDisclaimer.php')||
				($arr[count($arr)-1]=='editDisclaimer.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../home/editDisclaimer.php"><span class="content">Disclaimer</span></a>
				</li>
                <li><a class="<?php 
				if(($arr[count($arr)-1]=='editIntro.php')||
				($arr[count($arr)-1]=='editIntro.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../home/editIntro.php"><span class="content">Intro Page</span></a>
				</li>
			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>












<?

	$section_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE length(position)=1 and status=1 order by position asc");
	$section_set = mysqli_fetch_assoc($section_query);
	
do{
if($section_set['url_file']=="calendar.php"){
?>

<?php 
$current_id = base64_encode($section_set['maincat_id']);

if(($arr[count($arr)-1]=='index.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='index.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editCalendar.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editCalendar.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id']))
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
	  <ul>
        <li>
      <a href="#" class="<?php echo $var{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($section_set['maincat_name'],0,17)?></span> <img src="../images/Design_template.png" /></a>

               <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
 <li><a class="<?php if(($arr[count($arr)-1]=='editCalendar.php')||
				($arr[count($arr)-1]=='editCalendar.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../calendar/editCalendar.php?m=<?php echo $current_id?>"><span class="content">Calendar Side </span></a></li>
                            
               <li><a class="<?php if(($arr[count($arr)-1]=='index.php')||
				($arr[count($arr)-1]=='index.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../calendar/index.php?m=<?php echo $current_id?>"><span class="content">Manage Calendar </span></a></li>
			 </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>
<?php }elseif($section_set['url_file']=="gallery.php"){?>

<?php 
$current_id = base64_encode($section_set['maincat_id']);

if(
($arr[count($arr)-1]=='createAlbum.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='createAlbum.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='createPhoto.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='createPhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='managePhoto.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='managePhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editPhoto.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='editPhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) 
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $var{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($section_set['maincat_name'],0,17)?> </span> <img src="../images/Design_template.png" /></a>
			  <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
				<li><a class="<?php 
				if(($arr[count($arr)-1]=='createAlbum.php')||
				($arr[count($arr)-1]=='createAlbum.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../gallery/createAlbum.php?m=<?php echo $current_id?>"><span class="content">Create Album </span></a>				</li>	
                    <li><a class="<?php 
				if(($arr[count($arr)-1]=='createPhoto.php')||
				($arr[count($arr)-1]=='createPhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../gallery/createPhoto.php?m=<?php echo $current_id?>"><span class="content">Add Photo</span></a>				</li>            
              <li><a class="<?php 
				if(($arr[count($arr)-1]=='managePhoto.php')||
				($arr[count($arr)-1]=='managePhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id']) ||($arr[count($arr)-1]=='editPhoto.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../gallery/managePhoto.php?m=<?php echo $current_id?>"><span class="content">Manage Photo</span></a>				</li>	

			  </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>
<?php }elseif($section_set['url_file']=="multimedia.php"){?>
<?php 
$current_id = base64_encode($section_set['maincat_id']);

if(($arr[count($arr)-1]=='postMul.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='postMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editMul.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageMul.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) 
{ $multimediaFile='current'; $multimediaFilestyle='block'; }
else
{$multimediaFile=''; $multimediaFilestyle='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li> <a href="#" class="<?php echo $multimediaFile;?>" onClick="return kadabra('multimed',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($section_set['maincat_name'],0,17)?></span> <img src="../images/Design_template.png" /></a>
		    <ul id="multimed" style="display:<?php echo $multimediaFilestyle;?>">
				<li><a class="<?php 
				if(($arr[count($arr)-1]=='postMul.php')||
				($arr[count($arr)-1]=='postMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../multimedia/postMul.php?m=<?php echo $current_id?>"><span class="content">Upload <?php echo substr($section_set['maincat_name'],0,18)?> </span></a>
              </li>	
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageMul.php')||
				($arr[count($arr)-1]=='manageMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||($arr[count($arr)-1]=='editMul.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../multimedia/manageMul.php?m=<?php echo $current_id?>"><span class="content">Manage <?php echo substr($section_set['maincat_name'],0,18)?></span></a>
	  </li>
		    </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>
<?php }elseif($section_set['url_file']=="product.php"){?>

<?php 
$current_id = base64_encode($section_set['maincat_id']);

if(($arr[count($arr)-1]=='postProd.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='postProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editProd.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageProd.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='manageProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id']))
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
	  <ul>
<li> <a href="#" class="<?php echo $varstyle{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title">  <?php echo substr($section_set['maincat_name'],0,17)?></span> <img src="../images/Design_template.png" /></a>
                            <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
      
                              
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='postProd.php')||
				($arr[count($arr)-1]=='postProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../product/postProd.php?m=<?php echo $current_id?>"><span class="content">Add <?php echo substr($section_set['maincat_name'],0,18)?> </span></a> </li>
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageProd.php')||
				($arr[count($arr)-1]=='manageProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||($arr[count($arr)-1]=='editProd.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../product/manageProd.php?m=<?php echo $current_id?>"><span class="content">Manage <?php echo substr($section_set['maincat_name'],0,13)?> </span></a></li>
                                
			 </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>


<?php }elseif($section_set['url_file']=="news.php"){?>
<?php 
$current_id = base64_encode($section_set['maincat_id']);

if(($arr[count($arr)-1]=='postNews.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='postNews.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='editNews.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editNews.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageNews.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageNews.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id']))
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
	  <ul>
<li> <a href="#" class="<?php echo $var{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($section_set['maincat_name'],0,17)?></span>
<img src="../images/Design_template.png" /></a>
                            <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
      
                              
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='postNews.php')||
				($arr[count($arr)-1]=='postNews.php?'.$_SERVER['QUERY_STRING'])) { ?>current<?php }?>" href="../news/postNews.php?m=<?php echo $current_id?>"><span class="content">Add <?php echo substr($section_set['maincat_name'],0,18)?> </span></a> </li>
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageNews.php')||
				($arr[count($arr)-1]=='manageNews.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||($arr[count($arr)-1]=='editNews.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../news/manageNews.php?m=<?php echo $current_id?>"><span class="content">Manage <?php echo substr($section_set['maincat_name'],0,13)?> </span></a></li>
                                
			 </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>

<?php }elseif($section_set['url_file']=="document.php"){?>
<?
$current_id = base64_encode($section_set['maincat_id']);

if(($arr[count($arr)-1]=='postFile.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='postFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editFile.php'&&$_SESSION['current_section']==$section_set['maincat_id'])||
($arr[count($arr)-1]=='editFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageFile.php'&&$_SESSION['current_section']==$section_set['maincat_id'])|| 
($arr[count($arr)-1]=='manageFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) 
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
		<ul>
		  <li>
          <a href="#" class="<?php echo $var{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($section_set['maincat_name'],0,17)?> </span><img src="../images/Design_template.png" /></a>
		    <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
				<li><a class="<?php 
				if(($arr[count($arr)-1]=='postFile.php')||
				($arr[count($arr)-1]=='postFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../download/postFile.php?m=<?php echo $current_id?>"><span class="content">Upload <?php echo substr($section_set['maincat_name'],0,18)?> </span></a>
              </li>	
                 <li><a class="<?php 
				if(($arr[count($arr)-1]=='manageFile.php')||
				($arr[count($arr)-1]=='manageFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])||($arr[count($arr)-1]=='editFile.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../download/manageFile.php?m=<?php echo $current_id?>"><span class="content">Manage <?php echo substr($section_set['maincat_name'],0,13)?></span></a><div align="center">
	  </li>
		    </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>
<?php }?>

<?php }while($section_set = mysqli_fetch_assoc($section_query));?>






<?

	$custom_field_section_query = mysqli_query($conn, "SELECT * FROM murum_section WHERE length(position)=1 and url_file='custom_field.php' and status=1 order by position asc");
	$custom_field_section_set = mysqli_fetch_assoc($custom_field_section_query);
if($custom_field_section_set!=''){	
do{
?>

<?php 
$current_id = base64_encode($custom_field_section_set['maincat_id']);

if(($arr[count($arr)-1]=='postTemplate.php'&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||
($arr[count($arr)-1]=='postTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||
($arr[count($arr)-1]=='manageTemplate.php'&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||
($arr[count($arr)-1]=='manageTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||
($arr[count($arr)-1]=='editTemplate.php'&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||
($arr[count($arr)-1]=='editTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$custom_field_section_set['maincat_id']))
{ $var{$current_id}='current'; $varstyle{$current_id}='block'; }
else
{$var{$current_id}=''; $varstyle{$current_id}='none';}?>
<div align="center">
  <div id="localnav">
	<div id="menu">
	  <div align="left">
	  <ul>
        <li>
      <a href="#" class="<?php echo $var{$current_id};?>" onClick="return kadabra('<?php echo $current_id?>',this);" ><img src="../images/menu_open.gif" width="10" height="10" /><span class="main_title"> <?php echo substr($custom_field_section_set['maincat_name'],0,17)?></span> <img src="../images/Design_template.png" /></a>

               <ul id="<?php echo $current_id?>" style="display:<?php echo $varstyle{$current_id};?>">
 <li><a class="<?php if(($arr[count($arr)-1]=='postTemplate.php')||
				($arr[count($arr)-1]=='postTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])) { ?>current<?php }?>" href="../cus_field/postTemplate.php?m=<?php echo $current_id?>"><span class="content">Create <?php echo substr($custom_field_section_set['maincat_name'],0,13)?> </span></a></li>
               
 <li><a class="<?php if(($arr[count($arr)-1]=='manageTemplate.php')||
				($arr[count($arr)-1]=='manageTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$custom_field_section_set['maincat_id'])||($arr[count($arr)-1]=='editTemplate.php?'.$_SERVER['QUERY_STRING']&&$_SESSION['current_section']==$section_set['maincat_id'])) { ?>current<?php }?>" href="../cus_field/manageTemplate.php?m=<?php echo $current_id?>"><span class="content">Manage <?php echo substr($custom_field_section_set['maincat_name'],0,13)?> </span></a></li>

			 </ul>
		  </li>
		</ul>
	  </div>
	</div>
  </div>
</div>

<?php }while($custom_field_section_set = mysqli_fetch_assoc($custom_field_section_query));}?>
















<div id="menu">
  <div align="left">
	<ul>
	  <li> 
	  <a href="../CMS_help.pdf" target="_blank" class="<?php if($arr[count($arr)-1]=='CMS_help.php') { ?>current<?php }?>"><img src="../images/arrow.gif" width="10" height="10" border="0"><span class="main_title"> Help </span></a> <br />
	  </li>
	</ul>
  </div>
</div>


