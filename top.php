<link href="css.css" rel="stylesheet" type="text/css">
<title></title>
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
<style type="text/css">
<!--
.style1 {color: #5696D3}
.style2 {color: #4F98DD}
-->
</style>
<body onLoad="MM_preloadImages('images/nav_home02.gif','images/nav_feedback02.gif')"><a name="top" id="top"></a>
<table width="980"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td background="images/logo.jpg"><table width="980" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="145" align="right" valign="top"><div align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="right" valign="bottom"><img src="images/space.gif" width="20" height="12"></td>
            </tr>
            <tr>
              <td align="left" valign="bottom"><a href="index.php"><img src="images/space.gif" width="230" height="64" border="0"></a></td>
            </tr>
            <tr>
              <td align="right" valign="bottom"><div align="right"><span style="width:950px; border-bottom:3px solid #F00;">
                <?php include("running_text.php");?>
              </span></div></td>
            </tr>
            <tr>
              <td align="right" valign="bottom"><img src="images/space.gif" width="20" height="6"></td>
            </tr>
            <tr>
              <td valign="bottom">
              
              <div align="center">
              <div align="center" style="width:980px; border-bottom:0px solid #F00;">
                <div style="background:#41B3A3; margin-top:6px;">
                  <?php include("nav_top.php");?>
                </div>
              </div>
                <!--<table width="950" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="27" align="center" valign="bottom" class="navigation"><div align="center" style="color:#F00;"> 
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><a href="index.php" <?php if($_GET['root'] != 'MTc4' && $_GET['root'] != 'MTc2' && $_GET['root'] != 'MjIy' && $_GET['root'] != 'OTU=' && $_GET['root'] != 'MTYx'&& $_GET['root'] != 'MjQ1'){?> style="color:#F00;" <?php }?>></a><img src="images/n01.png" width="9" height="24" border="0"></div></td>
                          <td background="images/n01c.png"><div align="center"><a href="index.php" <?php if($_GET['root'] != 'MTc4' && $_GET['root'] != 'MTc2' && $_GET['root'] != 'MjIy' && $_GET['root'] != 'OTU=' && $_GET['root'] != 'MTYx'&& $_GET['root'] != 'MjQ1'){?> style="color:#fff;" <?php }?>>HOME</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n01b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      </div></td>
                    <td align="center" valign="bottom" class="navigation"><div align="center" style="color:#F00;"> 
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                          <td background="images/n05c.png"><div align="center"><a href="result.php?root=MTc4&id=MTE3" <?php if($_GET['root'] == 'MTc4'){?> style="color:#fff;"<?php }?>>ABOUT US</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      </div></td>
                    <td align="center" valign="bottom" class="navigation"><div align="center" style="color:#F00;"> 
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                          <td background="images/n05c.png"><div align="center"><a href="result.php?root=MjQ1" <?php if($_GET['root'] == 'MjQ1'){?> style="color:#fff;"<?php }?>>PHILOSOPHY</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      <a href="result.php?root=MjQ1" <?php if($_GET['root'] == 'MjQ1'){?> style="color:#F00;"<?php }?>></a> </div></td>
                    <td align="center" valign="bottom" class="navigation"><div align="center">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                          <td background="images/n05c.png"><div align="center"><a href="result.php?root=MTc2" <?php if($_GET['root'] == 'MTc2'){?> style="color:#fff;"<?php }?>>BUSINESSES</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      <a href="result.php?root=MTc2" <?php if($_GET['root'] == 'MTc2'){?> style="color:#F00;"<?php }?>></a><a href="result.php?root=MjIy" <?php if($_GET['root'] == 'MjIy'){?> style="color:#F00;"<?php }?>></a> </div></td>
                    <td align="center" valign="bottom" class="navigation"><div align="center">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                          <td background="images/n05c.png"><div align="center"><a href="result.php?root=MjIy" <?php if($_GET['root'] == 'MjIy'){?> style="color:#fff;"<?php }?>>NEWS</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      <a href="result.php?root=MjIy" <?php if($_GET['root'] == 'MjIy'){?> style="color:#F00;"<?php }?>></a><a href="result.php?root=OTU=" <?php if($_GET['root'] == 'OTU='){?> style="color:#F00;"<?php }?>></a> </div></td>
                    <td align="center" valign="bottom" class="navigation"><div align="center" style="color:#F00;">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                          <td background="images/n05c.png"><div align="center"><a href="result.php?root=OTU=" <?php if($_GET['root'] == 'OTU='){?> style="color:#fff;"<?php }?>>GALLERY</a></div></td>
                          <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                        </tr>
                      </table>
                      <a href="result.php?root=OTU=" <?php if($_GET['root'] == 'OTU='){?> style="color:#F00;"<?php }?>></a></div></td>
                     <td align="center" valign="bottom" class="navigation"><div align="center" style="color:#F00;">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <tr>
                           <td width="9" align="right"><div align="right"><img src="images/n05.png" width="9" height="24"></div></td>
                           <td background="images/n05c.png"><div align="center"><a href="result.php?root=MTYx&id=MTMy" <?php if($_GET['root'] == 'MTYx'){?> style="color:#fff;"<?php }?>>CONTACT US</a></div></td>
                           <td width="9" align="left"><div align="left"><img src="images/n05b.png" width="9" height="24"></div></td>
                         </tr>
                       </table>
                       <a href="result.php?root=MTYx&id=MTMy" <?php if($_GET['root'] == 'MTYx'){?> style="color:#F00;"<?php }?>></a> </div></td>
                  </tr>
                </table> -->
              </div>                 </td>
            </tr>
            <tr>
              <td><img src="images/space.gif" width="980" height="3"></td>
            </tr>
          </table>
        </div></td>
        </tr>
      
    </table></td>
  </tr>
</table>

