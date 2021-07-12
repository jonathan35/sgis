<?php 
require_once("../../Connections/pamconnection.php");
session_start();
//set_session_to_contentApproval('a'); 

	if($_SESSION['validation']=='YES')
	{}	
	else
	header("Location:login.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<LINK 
href="../images/the.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript src="images/the.js" type=text/javascript></SCRIPT>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>

<style type="text/css">
<!--
.style11 {font-family: Arial}
-->
</style>
<title>Change Password</title>
<META content="MSHTML 6.00.2900.2769" name=GENERATOR>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style12 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="790" border="0" align="center">
<tr><td colspan="2"><img src="../images/cmservice.jpg" width="800" height="50"></td></tr>
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div id="titlename"><span class="white_title">CHANGE PASSWORD </span></div>
            <div class="shadow"></div>
        </div>	
	</div></td>
  </tr>
  <tr>
    <td width="194" align="left" valign="top">
	<?php include('../menu.php');?>
	</td>
    <td width="602" align="left" valign="top">
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td>
<table width="100%" cellpadding="2" cellspacing="2">
        <tr>
          <td><Form METHOD="post" ACTION="change_password.php">
              <span class="content style7 style12">* Compulsory Entry </span>
              <h2 align="left" class="pagetitle">Change Password: </h2>
              <table border="0" cellpadding="0" cellspacing="0" width="100%" id="form">
                <tr>
                  <th class="font12"><div align="left"><span class="content style7 style12">*</span> <span class="content">Current Password:</span></div></th>
                  <td><INPUT TYPE="password" NAME="OldPassword" VALUE="" SIZE=20 MAXLENGTH=20>
                      <input type=hidden name=s value=a></td>
                </tr>
                <tr>
                  <th class="font12"><div align="left"><font class="style23 style7 style11 style12">*</font> <span class="content">New Password:</span></div></th>
                  <td><INPUT TYPE="password" NAME="NewPassword" VALUE="" SIZE=20 MAXLENGTH=20>
                  </td>
                </tr>
                <tr>
                  <th class="font12"><div align="left"><span class="style23 style7 style11 style12">*</span> <span class="content">Re-enter Password:</span></div></th>
                  <td><INPUT TYPE="password" NAME="ComfirmPassword" VALUE="" SIZE=20 MAXLENGTH=20></td>
                </tr>
              </table>
              <br>
              <div class="font12" align="center">
                <p>
                  <input class="content"type="submit" name="Change" value=" Save ">
                  <input class="content"type="reset" name="Reset" value=" Reset ">
            </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
          </form>
          </td>
        </tr>
        <tr>
          <td>
            <?php
	
  	$oldpass=$_POST['OldPassword'];
	$newpass=$_POST['NewPassword'];
	$comfirmpass=$_POST['ComfirmPassword']; 
	$sql="SELECT password FROM login WHERE password='".$oldpass."'";
	$Result1 = mysqli_query($conn, $sql) or die(mysqli_error());	  
	$r=mysqli_fetch_assoc($Result1);
	$stat='no';
	if ($_POST['s']<>'')$stat='yes';
	if($r['password']==$oldpass){
		  if($newpass==$comfirmpass && $newpass!="" && $comfirmpass!="" && $stat=='yes' )
				  {?>
            <?php $insertSQL = "UPDATE login SET password='$newpass' WHERE password='$oldpass'";
							mysqli_select_db($conn, $database_pamconnection);
							$Result1 = mysqli_query($conn, $insertSQL) or die(mysqli_error());	  
						?>
            <h3 align="center" class="content"><strong> Password Update Successfully </strong></h3>
            <?php $stat='yes';}//correct 1
					  else if($newpass==$comfirmpass && ($newpass=="" || $comfirmpass=="")  && $stat=='yes')
				  {?>
            <h3 align="center" class="content"><strong> NO Blank Password is Allowed </strong></h3>
            <?php }//correct 2
					  else if ($newpass <> $confirmpass && $stat=='yes')
				  {?>
            <h3 align="center" class="content"><strong> New Password Is Not Match The Re-Entered Password </strong></h3>
            <?php }//correct 3
		} else
		  {?>
            <h3 align="center" class="content"><strong> Current Existing Password Is Not Correct </strong></h3>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><table border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td vAlign=bottom colSpan="3" class="greybg" width="800"><div align="center" class="content">&copy;Copyright of WebAndYou<br>
        contact web and you <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </div></TD>
            </tr>
          </table></td>
        </tr>
      </table>
          </td>
        </tr>
      </table>      
</td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:200px; height:115px; z-index:1; left: 696px; top: 6px;">
  <table width="200" cellspacing="2" cellpadding="2">
    <tr>
      <td><span class="main_title">| <a href="logout2.php">Sign out</a> |</span></td>
    </tr>
  </table>
</div>
</body>
</html>
