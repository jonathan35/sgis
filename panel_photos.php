<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=text/html; charset=iso-8859-1" />
<title>Sarawak Children's Cancer Society....Your Care, Our Hope</title>
<link href="sccs.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>
</head>

<body>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="images/right_title_02.jpg" width="200" height="27" /></td>
        </tr>
        <tr>
          <td background="images/bg_right.gif">
            <?php if($leftpanelcontent!=''){?>            
            <table width="200" border="0" cellpadding="0" cellspacing="3">
              <?php if($leftpanelcontent['photo']!=''){?>
              <tr>
                <td><div align="center"><img src="dynamic_cpt/left/<?php echo $leftpanelcontent['photo'];?>" width="150" height="120" /></div></td>
              </tr>
			  <?php }?>
              <tr>
                <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if($leftpanelcontent['content']!=''){?>
                    <tr>
                      <td class="content_text"><div align="justify"><?php echo substr($leftpanelcontent['content'], 0, 50).'..';?></div></td>
                    </tr><?php }?>
                </table></td>
              </tr>
              <?php if($leftpanelcontent['photo2']!=''){?>
              <tr>
                <td><div align="center"><img src="dynamic_cpt/left/<?php echo $leftpanelcontent['photo2'];?>" width="150" height="120" /></div></td>
              </tr><?php }?>
              <tr>
                <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if($leftpanelcontent['content2']!=''){?>
                    <tr>
                      <td class="content_text"><div align="justify"><?php echo substr($leftpanelcontent['content2'], 0, 50).'..';?></div></td>
                    </tr><?php }?>
                </table></td>
              </tr>
              <?php if($leftpanelcontent['photo3']!=''){?>
              <tr>
                <td><div align="center"><img src="dynamic_cpt/left/<?php echo $leftpanelcontent['photo3'];?>" width="150" height="120" /></div></td>
              </tr><?php }?>
              <tr>
                <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if($leftpanelcontent['content3']!=''){?>
                    <tr>
                      <td class="content_text"><div align="justify"><?php echo substr($leftpanelcontent['content3'], 0, 50).'..';?></div></td>
                    </tr><?php }?>
                </table></td>
              </tr>
              <?php if($leftpanelcontent['photo4']!=''){?>
              <tr>
                <td><div align="center"><img src="dynamic_cpt/left/<?php echo $leftpanelcontent['photo4'];?>" width="150" height="120" /></div></td>
              </tr><?php }?>
              <tr>
                <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if($leftpanelcontent['content4']!=''){?>
                    <tr>
                      <td class="content_text"><div align="justify"><?php echo substr($leftpanelcontent['content4'], 0, 50).'..';?></div></td>
                    </tr><?php }?>
                </table></td>
              </tr>
              <?php if($leftpanelcontent['photo5']!=''){?>
              <tr>
                <td><div align="center"><img src="dynamic_cpt/left/<?php echo $leftpanelcontent['photo5'];?>" width="150" height="120" /></div></td>
              </tr><?php }?>
              <tr>
                <td valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <?php if($leftpanelcontent['content5']!=''){?>
                    <tr>
                      <td class="content_text"><div align="justify"><?php echo substr($leftpanelcontent['content5'], 0, 50).'..';?></div></td>
                    </tr><?php }?>
                </table></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image50','','images/pointer_03b.gif',1)" onclick="window.open('moreleftpanel.php?id=<?php echo $leftpanelcontent['id']?>','_blank','width=575,height=800,scrollbars=yes,status=no,location=no');"><img src="images/more.gif" width="50" height="18" border="0" /></a></div></td>
              </tr>
            </table>
          <?php }?>          </td>
        </tr>
        <tr>
          <td background="images/bg_right_02.gif"><img src="images/space.gif" width="200" height="8" /></td>
        </tr>
        <tr>
          <td><img src="images/space.gif" width="200" height="10" /></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
