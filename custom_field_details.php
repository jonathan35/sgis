<?php require_once('Connections/pamconnection.php'); 

$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
$detail=base64_decode($_GET['detail']);

if(base64_decode($_GET['root'])=='140'|| base64_decode($_GET['root'])=='159'|| base64_decode($_GET['root'])=='160'){
	$bookform="booking1.php";
}else{
	$bookform="booking02.php";
	
	}
   


if($detail!="")
{
	
$selected_query=mysqli_query($conn, "select * from custom_field_section where status=1 and id='".$detail."' ");
$selected=mysqli_fetch_assoc($selected_query);

$image_field_query = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE field_status=1 and section_id='".$section_id."' and field_type='file' order by field_position asc limit 12 ");
$image_field = mysqli_fetch_assoc($image_field_query);	

$count=0;
do{
$picture[$count]=$selected[$image_field['table_field']]; 
$count++;
}while($image_field = mysqli_fetch_assoc($image_field_query));
}


?>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<script language="javascript">
function change_picture(id)
{
   var main=document.getElementById("main");
   var second=document.getElementById(id);
	main.src=second.src;
}
</script>
<link href="css.css" rel="stylesheet" type="text/css">

<table width="100%" border="0" cellpadding="0" cellspacing="10">
    <tr>
    <td><?php include("printer_friendly.php")?>
</td>
  </tr>
  <tr>
    <td><table width="500" border="0" cellpadding="0" cellspacing="0" background="images/frame_detail.gif" style="background-repeat:no-repeat;">
        <tr>
                <td width="500" height="260" align="left" valign="top">
                <table width="100%" border="0" cellpadding="0" cellspacing="1" >
                  <tr>
                    <td width="4" align="left" valign="top"><img src="images/space.gif" width="4" height="24" /></td>
                    <td width="375" align="left" valign="top"><img src="images/space.gif" width="24" height="4" /><br />
                  <img src="<?php if($picture[0]!=''){ echo $picture[0]; }else {echo "default_item.gif";}?>" width="375" height="250" id="main" > 
                                          
                    </td>
                    <td width="116" align="center" valign="top">
                    <div style="position:relative; width:100%;">
                    <img src="images/space.gif" width="24" height="4" /><br />
                      <table border="0" cellspacing="1" cellpadding="0">
                        <tr>
                          <td align="left" valign="top">
							<?php if($picture[0]!='') {?>
                            <img src="<?php if($picture[0]!='') { echo $picture[0]; }else {echo "default_item.jpg";}?>" id="1" width="54" height="36" onmouseover="change_picture(1,11)" >
                            <?php }?> 
                          </td>
                          <td align="left" valign="top">
                          	<?php if($picture[1]!='') {?>
                            <img src="<?php if($picture[1]!='') { echo $picture[1]; }else {echo "default_item.jpg";}?>" id="2" width="54" height="36" onmouseover="change_picture(2,22)" >
                            <?php }?>
                          
                        
                          
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                          <?php if($picture[2]!='') {?>
                          <img src="<?php if($picture[2]!=''){ echo $picture[2]; }else {echo "default_item.gif";}?> " id="3" width="54" height="36" onmouseover="change_picture(3,33)" >
                          <?php }?>
                          </td>
                          <td align="left" valign="top">
                          <?php if($picture[3]!='') {?>
                          <img src="<?php if($picture[3]!=''){ echo $picture[3]; }else {echo "default_item.gif";}?> " id="4" width="54" height="36" onmouseover="change_picture(4,44)" >
                          <?php }?>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                          <?php if($picture[4]!='') {?>
                          <img src="<?php if($picture[4]!=''){ echo $picture[4]; }else {echo "default_item.gif";}?> " id="5" width="54" height="36" onmouseover="change_picture(5,55)" >
                          <?php }?>
                          </td>
                          <td align="left" valign="top">
                          <?php if($picture[5]!='') {?>
                          <img src="<?php if($picture[5]!=''){ echo $picture[5]; }else {echo "default_item.gif";}?> " id="6" width="54" height="36" onmouseover="change_picture(6,66)" >
                          <?php }?>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                          <?php if($picture[6]!='') {?>
                          <img src="<?php if($picture[6]!=''){ echo $picture[6]; }else {echo "default_item.gif";}?> " id="7" width="54" height="36" onmouseover="change_picture(7,77)" >
                          <?php }?>
                          </td>
                          <td align="left" valign="top">
                          <?php if($picture[7]!='') {?>
                          <img src="<?php if($picture[7]!=''){ echo $picture[7]; }else {echo "default_item.gif";}?> " id="8" width="54" height="36" onmouseover="change_picture(8,88)" >
                          <?php }?>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                          <?php if($picture[8]!='') {?>
                          <img src="<?php if($picture[8]!=''){ echo $picture[8]; }else {echo "default_item.gif";}?> " id="9" width="54" height="36" onmouseover="change_picture(9,99)" >
                          <?php }?>
                          </td>
                          <td align="left" valign="top">
                          <?php if($picture[9]!='') {?>
                          <img src="<?php if($picture[9]!=''){ echo $picture[9]; }else {echo "default_item.gif";}?> " id="10" width="54" height="36" onmouseover="change_picture(10,1010)" >
                          <?php }?>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                          <?php if($picture[10]!='') {?>
                          <img src="<?php if($picture[10]!=''){ echo $picture[10]; }else {echo "default_item.gif";}?> " id="11" width="54" height="36" onmouseover="change_picture(11,1111)" >
                          <?php }?>
                          </td>
                          <td align="left" valign="top">
                          <?php if($picture[11]!='') {?>
                          <img src="<?php if($picture[11]!=''){ echo $picture[11]; }else {echo "default_item.gif";}?> " id="12" width="54" height="36" onmouseover="change_picture(12,1212)" >
                          <?php }?>
                          </td>
                        </tr>
                      </table>
                      <img src="images/space.gif" width="24" height="4" />
                      <div style="position:absolute; width:100%; text-align:left; top:230px; left: 8px;" align="left">
                      <a href="#" onclick="MM_openBrWindow('<?php echo $bookform?>?tour=<?php echo $selected['field1'];?>&code=<?php echo $selected['field22']?>','BOOKING','scrollbars=yes,resizable=yes,width=700,height=750')" onMouseOver="MM_swapImage('nav_book','','images/book02.gif',1)" onMouseOut="MM_swapImgRestore()">
                      <img src="images/book01.gif" name="nav_book" width="100" height="22" border="0" id="nav_book" /></a>
                      </div>
                      </div>
                      </td>
                  </tr>
                </table></td>
        </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
            	    <td>
                
                
<div>
<?
	$field_listing_query = mysqli_query($conn, "SELECT * FROM dcui_template_setting WHERE field_status=1 and section_id='".$section_id."' and field_type!='file' and field_type!='position' and (field_display=2 or field_display=3) order by field_position asc ");
	$field_listing = mysqli_fetch_assoc($field_listing_query);	


$class = array('heading6','title2','title5','title5','title5','heading','title8','title8','title8','title8','title5'); // Class apply to the text
$position_y = array('top:0px','top:0px','top:0px','top:0px','top:0px','top:0px','top:0px','top:0px','top:0px','top:10px','top:10px',); // Y position range from top
$character_limit = array('55555','55555','55555','55555','999999','999999','999999','999999','999999','999999','999999','999999','999999','999999','999999',);// text character limit
$background_top = array('','','','','','','','','','','','background:url(images/frame_a.gif);','','','');
$background_middle = array('','','','','','','','','','','','background:url(images/frame_b.gif);','','','');
$background_btm = array('','','','','','','','','','','','background:url(images/frame_c.gif);','','','');
$marginTop = array('margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:2px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;','margin:20px 1px 0px 1px;'); 
$array_no=0;


do{ 
	$field_name =$field_listing['table_field'];
?>
    <div class=""></div>   
    <?php if($selected[$field_name]!=''){?>                              
    <div style="text-align:left; position:relative; width:100%; <?php echo $marginTop[$array_no]?> <?php echo $position_y[$array_no]?>;" class="<?php echo $class[$array_no]?>">
    	
    	<?php if($background_top[$array_no]!=''){?>
        <div style="text-align:left; height:15px; background-repeat:no-repeat; <?php echo $background_top[$array_no]?>"></div>
        <?php }?>
        <div style="text-align:left; background-repeat:no-repeat; <?php echo $background_middle[$array_no]?> <?php if($background_middle[$array_no]!='') echo "padding:0px 10px 0px 10px;";?>">
        <?php if($field_listing['field_title_display']=='1'){?>
            <div style="text-align:left; padding:0 0 3px 0; color:#900; font-weight:bold;">
                <span class="<?php echo $class[$array_no]?>"><strong><?php echo $field_listing['field_name'];?></strong></span>
            </div>
		<?php }?>
        <?php if($field_listing['field_type']=='file02'){?>
            <div style="text-align:right; width:100%;" class="heading3">
                <strong><a href="<?php echo $selected[$field_name]?>" target="_blank"><img src="images/pdf.gif" border="0" /></a>&nbsp;&nbsp;</strong>
            </div>
        <?php }else{?>
		
		<!--<a href="result.php?root=<?php echo $_GET['root']?>&detail=<?php echo base64_encode($selected['id']);?>&main=<?php echo $_GET['main']?>&sub=<?php echo $_GET['sub']?>"> -->
		<?php if($field_listing['field_type']=='price'){ echo "<span style=\"font-size:10px;\">From</span> ".$field_listing['price_currency']; }?><?php $content01 = str_replace("../../photo/","photo/",$selected[$field_name])." ";
		echo substr( $content01, 0,strrpos( substr($content01, 0, $character_limit[$array_no]), ' ' ));
		if(strlen($content01)>$character_limit[$array_no])echo "..";?><?php if($field_listing['field_type']=='price'){ echo "<span style=\"font-size:10px;\">&nbsp;&nbsp;".$field_listing['price_note']; }?><!--</a> -->
		
        <?php }?><br />
        </div>
	</div>
        <?php if($background_btm[$array_no]!=''){?>
        <div style="height:15px; margin-top:0 1px 13px 1px; background-repeat:no-repeat; <?php echo $background_btm[$array_no]?>"></div>
        <?php }?>      
    
    <?php }?>
<?php $array_no++;}while($field_listing = mysqli_fetch_assoc($field_listing_query));?>                   
</div>                
                
                	</td>
                </tr>               
      </table>
                <span class="contentArial-red"><img src="images/space.gif" width="24" height="10" /></span><br>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><br />
                    <a href="#" onclick="MM_openBrWindow('<?php echo $bookform ?>?tour=<?php echo $selected['field1'];?>&code=<?php echo $selected['field22']?>','BOOKING','scrollbars=yes,resizable=yes,width=650,height=750')" onMouseOver="MM_swapImage('nav_book02','','images/book02.gif',1)" onMouseOut="MM_swapImgRestore()">
                    <img src="images/book01.gif" name="nav_book21" width="100" height="22" border="0" id="nav_book02" /></a><br>
                    </td>
                  </tr>
  </table></td>
          </tr>
        </table>           
        