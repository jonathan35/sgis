<?php session_unset();
	session_start();
	//johnny 9/11/2005 needed for unset the session
	$_SESSION['validation'] = "NO";
	//to ensure member did pass the username and password to this file for filtering.
	//$_SESSION["filtered"] = "YES";
	//$_SESSION["type"] = "public";

	//$_SESSION["comid"] = 10001;
	setcookie("aspen_password",'',time()+604800);
	setcookie("aspen_username",'',time()+604800);
	//header("Location:../login.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css" media="all">
@import url(css/layout.css);
@import url(css/font.css);
@import url(css/common.css);
@import url(css/component.css);</style>
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript"></script>
<title>Login Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
function bookmark(url, description)
{
netscape="Netscape User's hit CTRL+D to add a bookmark to this site."
	if (navigator.appName=='Microsoft Internet Explorer')
	{	
		window.external.AddFavorite(url, description);
	}
	else if (navigator.appName=='Netscape')
	{
		alert(netscape);
	}
}

//-->
</script>

<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #FFFFFF;
}
.style22 {font-size: 10px; font-family: Arial; font-weight: bold; }
.style10 {font-size: 12px;
	color: #FF0000;
	font-weight: bold;
}
.style11 {font-family: Arial}
.style14 {font-size: 10px;
	font-weight: bold;
}
.style15 {font-size: 10px}
.style2 {font-family: Arial;
font-size:12px;
}
.style9 {font-size: 12px; font-family: Arial; font-weight: bold; }
-->
</style>
<title>Welcome to Web And You Web Solutions</title></head>

<body topmargin="3px" leftmargin="2px">

<div align="left">
  <table width="800" align="center" cellpadding="0"  cellspacing="0">
    <tr>
      <td colspan="2" bgcolor="#FFFFFF">
        <div align="center"><img src="../images/cmservice.jpg" width="800" height="50"></div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td colspan="2" bgcolor="#FFFFFF"><div id="menu">
        <div align="left">
          <ul>
            <li></li>
          </ul>
        </div>
      </div>
        <table width="800" height="314" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="169" valign="top" bgcolor="#FFFFFF" class="style2"><p>&nbsp;</p></td>
            <td width="419" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="password.php">
                <table width="391" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#FFFFCC" summary="">
                  <tbody>
                    <tr bgcolor="#FFFFFF">
                      <td width="66" align="left" nowrap="nowrap" class="style9"><span class="style21"> <strong class="titlemain">&nbsp;&nbsp;&nbsp;Username:</strong>&nbsp; </span></td>
                      <td width="345" nowrap="nowrap">
                        <input name="txtname" type="text" class="style2" id="txtname3" size="30" 
										  value="<?php if (!empty($_COOKIE['aspen_username'])){ 
										  	echo $_COOKIE['aspen_username'];
										  }else{ echo "";}?>">
&nbsp;&nbsp; </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td colspan="2" nowrap="nowrap">&nbsp; </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" nowrap="nowrap" class="style9"><strong> <span class="titlemain"><span class="style21"><strong class="titlemain">&nbsp;&nbsp;&nbsp;</strong></span>Password:</span>&nbsp; </strong></td>
                      <td nowrap="nowrap">
<input name="txtpassword" type="password" class="style2" id="txtpassword2" size="30"
										  value="<?php if (!empty($_COOKIE['aspen_password'])){ 
										  	echo $_COOKIE['aspen_password'];
										  }else{ echo "";}?>">
&nbsp;&nbsp; </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td nowrap="nowrap">&nbsp; </td>
                      <td nowrap="nowrap"><input name="autoSignin" type="checkbox" id="autoSignin2" value="yes" <?
										if (!empty($_COOKIE['aspen_password']) || !empty($_COOKIE['aspen_username'])){ ?> checked<?php }
										?>>                        <span class="style2">Remember my username and password </span></td>
                    <tr style="background-color:#FFF;">
                    	<td align="right" nowrap="nowrap">&nbsp;</td>
                   	  <td>
                        <img src="captcha/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" style="margin-bottom:0px;margin-top:6px;">
                      </td>                        
                    </tr>
                    <tr valign="top" style="background-color:#FFF;">
                      <td align="right" nowrap="nowrap" class="style9"><strong>Type the above code</strong></td>
                      <td nowrap="nowrap">
                        <input name="code" type="text" maxlength="33" style="width:195px;" />
                      <br>
                      <span class="style22">This code can be typed in all lowercase</span></td>
                    </tr> 
                                        
                  </tr>
                    <tr bgcolor="#FFFFFF">
                      <td align="left" nowrap="nowrap">&nbsp; </td>
                      <td nowrap="nowrap">
                      <input name="submit2" type="submit" class="content" title="Login" onClick="if(document.loginPanel7671.txtname.value == ''){alert('Please enter your username');document.loginPanel7671.txtname.focus();return false;}else if(document.loginPanel7671.txtpassword.value == ''){alert('Please enter your password');document.loginPanel7671.txtpassword.focus();return false;}else{return true;}" onMouseOver="window.status='Login';return true;" onMouseOut="window.status=' ';return true;" value="Login">                      </td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td colspan="2" nowrap="nowrap"><a href="mailto:support@webnyou.com" class="style9">Forgot your password?</a></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td colspan="2" nowrap="nowrap"><?php if (@$_GET['str']=='wrong'){ ?>                        
                        <p class="style11"><span class="style10">W R O N G - P A S S W O R D - F O U N D !!!</span> <br>
                          <span class="style14">You've entered an invalid password. Please ensure: </span>
                        <p class="style22">1. &quot;Caps Lock&quot; is set correctly as Passwords are case sensitive.<br>
                    2. You have not included any blank spaces <br>
                    after your Member ID or password.<br>
                    <br>
                    </p>                      
                      <?php } ?></td>
                    </tr>
                  </tbody>
                </table>
            </form></td>
          </tr>
        </table></td>
    </tr>
  </table>
</div>
<div id="Layer1" style="position:absolute; width:200px; height:32px; z-index:1; left: 804px; top: 6px;">
  <table width="113" cellspacing="2" cellpadding="2">
    <tr>
      <td width="103"><span class="main_title">| <a href="../../index.php">Home Page</a> |</span></td>
    </tr>
  </table>
</div>
</body>
</html>
