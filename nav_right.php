<?
require_once('Connections/pamconnection.php'); 


	$calender_query = mysqli_query($conn, "select * from calendar_mssgs where 
								  y>'".date("Y")."' or
								  (y='".date("Y")."' and m>'".date("m")."') or
								  (y='".date("Y")."' and m='".date("m")."' and d>='".date("d")."')
								  order by y asc, m asc, d asc, id desc limit 8");
	$calender_set = mysqli_fetch_array($calender_query);
	
	$right_panel_query=mysqli_query($conn, "SELECT * FROM side_panel WHERE status=1 and left_or_right=2 order by position asc, id desc ");
	$right_panel = mysqli_fetch_assoc($right_panel_query);


?>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<link href="css.css" rel="stylesheet" type="text/css">
<?php 
	$width_of_C3_query=mysqli_query($conn, "SELECT * FROM dcui_section_cpanel WHERE id=3");
	$width_of_C3=mysqli_fetch_assoc($width_of_C3_query);

?>
<table width="<?php echo $width_of_C3['record'];?>" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" background="images/line_panel02.gif"><img src="images/side02.gif" width="246" height="8" /></td>
      </tr>
      <tr>
        <td>

      <table width="93%" border="0" cellspacing="0" cellpadding="0" align="center">
      			<tr>
                <td align="left" valign="bottom" background="images/news.jpg">
                <img src="images/space.gif" height="35"  />                </td>
              </tr>
      
              <tr>
                <td align="left" valign="top"><?php include("intro01b.php");?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><div align="right" class="content_text9"><a href="result.php?root=MjIy">Read more&nbsp;&nbsp;</a><a href="result.php?root=MjIy" ><img src="SpryAssets/SpryMenuBarRight.gif" width="4" height="7" border="0" /></a>&nbsp;&nbsp;</div></td>
              </tr>
              <tr>
                <td align="right" valign="top"><img src="images/space.gif" width="20" height="10" /></td>
              </tr>
            </table>
      	<table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/line_panel02.gif">
          <tr>
            <td><img src="images/line_panel02.gif" width="180" height="11" /></td>
          </tr>
        </table></td>
      </tr>
      
      <tr>
        <td align="left" valign="top">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
            <?
			$selected_query=mysqli_query($conn, "select * from home_section where id=2");
			$selected=mysqli_fetch_assoc($selected_query);
			?>
             <!-- <?php //echo str_replace("../../photo/","photo/",$selected['description']); ?>!-->              </td>
            </tr>
          </table> 
        <!--  <div align="left"><span class="title2"><br>
            </span><br>
          <span class="title2">
         <a href="javascript:openPosting(<?php //echo $calender_set['id']?>)" > !-->
         <!--<br>
          <br>
          </span><span class="title2"></span><br />
        </div></td>
      </tr>!-->
    </table>
    
   
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 
if($right_panel!=''){
do{?>       
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
            <tr>
              <td></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><span class="content_text5"><?php echo str_replace("../../photo/","photo/",$right_panel['side_brief']);?></span></td>
              </tr>
              <tr>
                <td><img src="images/space.gif" width="20" height="10" /></td>
              </tr>
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/line_panel02.gif">
                      <tr>
                        <td><img src="images/line_panel02.gif" width="180" height="11" /></td>
                    </tr>
                  </table>                
                </td>
              </tr>
          </table>
          </td>
        </tr>
<?php }while($right_panel = mysqli_fetch_assoc($right_panel_query));}?>        
        
        
        
        <!--<tr>
          <td>
            <span class="heading4">FOLLOW US ON</span><br>
            <img src="images/space.gif" width="20" height="5" /> <br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top"><a href="http://www.facebook.com" target="_new"><img src="images/icon_fb.gif" width="38" height="38" border="0"></a></td>
                <td align="center" valign="top"><a href="http://www.tweeter.com" target="_new"><img src="images/icon_tweeter.gif" width="38" height="38" border="0"></a></td>
                <td align="center" valign="top"><a href="http://www.youtube.com" target="_new"><img src="images/icon_yt.gif" width="38" height="38" border="0"></a></td>
              </tr>
              <tr class="navigation">
                <td align="center" valign="top">Facebook</td>
                <td align="center" valign="top">Twitter</td>
                <td align="center" valign="top">YouTube</td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/line_panel02.gif">
              <tr>
                <td><img src="images/line_panel02.gif" width="175" height="21" /></td>
              </tr>
          </table></td>
        </tr> -->
      </table></td>
  </tr>
</table>


