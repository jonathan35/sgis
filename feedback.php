<?php require_once("Connections/pamconnection.php");

include("captcha/securimage.php");
$img = new Securimage();
$valid = $img->check($_POST['code']);

$send=null;


if($_POST['Submit']=='Submit'){
	if($valid == true){
			
			
			
		$to='grandaa.sgiscert@gmail.com';
		$to2='support@webnyou.com';
		$subject='SGIS Online Feedback Form';
		$email=$_POST['email'];
		/*ini_set(SMTP, "mail.sarawakhost.com");
		ini_set(smtp_port, "587");
		ini_set(sendmail_from, $email);*/
		$header = "MIME-Version: 1.0" . "\r\n";
		$header.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
		$header.= 'From: <'.$email.'>' . "\r\n";
		
		$content.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		</head>
		<style>
		.title{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; }
		.content{ font-family:Verdana, Arial, Helvetica, sans-serifl; font-size:12px;}
		</style>
		<body>
		<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
		  <tr><td>
		<table width="100%"  border="0" align="center" cellpadding="4" cellspacing="6" bgcolor="#DCE1E9" class="content">
		<tr>
		<td colspan="2" class="title">SGIS Online Feedback Form</td>
		</tr>
		<tr>
		<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
		<td colspan="2" align="right">'.date("jS F Y").'</td>
		</tr>
		<tr class="style9">
		<td>&nbsp;</td>
		</tr>';
		if($_POST['name']!=''){
		$content.='<tr class="style9">
		<td width="32%">Name</td>
		<td width="68%">'.$_POST['name'].'</td>
		</tr>';}
		if($_POST['company']!=''){
		$content.='<tr class="style9">
		<td>Company or Organisation </td>
		<td>'.$_POST['company'].'</td>
		</tr>';}
		if($_POST['designation']!=''){
		$content.='<tr class="style9">
		<td>Designation</td>
		<td>'.$_POST['designation'].'</td>
		</tr>';}
		if($_POST['email']!=''){
		$content.='<tr class="style9">
		<td>Email</td>
		<td>'.$_POST['email'].'</td>
		</tr>';}
		if($_POST['phone']!=''){
		$content.='<tr class="style9">
		<td>Phone Contact </td>
		<td>'.$_POST['phone'].'</td>
		</tr>';}
		if($_POST['address']!=''){
		$content.='<tr class="style9">
		<td width="32%" valign="top">Address</td>
		<td width="68%">'.$_POST['address'].'</td>
		</tr>';}
		if($_POST['categorize']!=''){
		$content.='<tr class="style9">
		<td valign="top">How would you categorize your message?</td>
		<td>'.$_POST['categorize'].'</td>
		</tr>';}
		if($_POST['message']!=''){
		$content.='<tr class="style9">
		<td valign="top">Your Message </td>
		<td>'.$_POST['message'].'</td>
		</tr>';}
		
		$content.='<tr class="style9">
		<td colspan="2" valign="top"><div align="center">
			</div></td>
		</tr>
		</table>
		</td></tr></table></body>
		</html>';
		
		
		if(mail($to, $subject, $content, $header)){
		mail($to2, $subject, $content, $header);
		//mail($to3, $subject, $content, $header);
		$send='<font color=#336600>Feedback sent</font>';
		}else
		$send='<font color=#CC3300>Failed to send. Please try again.</font>';
	}else{
		$send='<font color=#CC3300>Failed to send. Please fill in the code.</font>';
	}
}?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Feedback</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
body {
	background-image: url();
	background-repeat:repeat-y;
	background-position:center;
}
-->
</style>
</head>
<script>
function check()
{
	if(document.form1.name.value==''){alert("Please enter your name. Thank You."); document.form1.name.focus(); return false;}
	if(document.form1.email.value==''){alert("Please enter your email address. Thank You."); document.form1.email.focus(); return false;}
	if(document.form1.email.value.indexOf('@')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email.focus(); return false;}
	if(document.form1.email.value.indexOf('.')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email.focus(); return false;}
	//if(document.form1.phone.value==''){alert("Please enter your contact number. Thank You."); document.form1.phone.focus(); return false;}
	return true;
}
</script>
<link href="css.css" rel="stylesheet" type="text/css">
<body>
<form name="form1" method="post" action="feedback.php">
  <table width="500"  border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td><img src="images/01a.gif" width="10" height="10"></td>
      <td background="images/02a.gif"><img src="images/02a.gif" width="500" height="10"></td>
      <td><img src="images/03a.gif" width="10" height="10"></td>
    </tr>
    <tr>
      <td background="images/04a.gif"><img src="images/04a.gif" width="10" height="100"></td>
      <td background="images/bg_white.jpg"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="6" class="title6">
        <tr>
          <td colspan="2" class="heading3"><strong>LEAVE A MESSAGE</strong></td>
        </tr>
        <tr>
          <td colspan="2"><div><span class="content_text"><strong>When you're done, click the Submit button at the bottom of the page. We will make every effort to respond to your comments or questions in a timely manner. </strong></span></div>
              <div align="right" class="headingsmall"><span class="invalid style1">*</span> <span class="style1"></span> Required </div></td>
        </tr>
        
        <tr class="style9">
          <td width="226">
          	<span class="headingsmall">Name <span class="invalid style1">*</span> </span><br>          </td>
          <td width="256"><input name="name" type="text" class="style7" id="name" size="38" /></td>
        </tr>
        <tr class="style9">
          <td class="headingsmall">Company or Organisation </td>
          <td><input name="company" type="text" class="style7" id="company" size="38" /></td>
        </tr>
        <tr class="style9">
          <td class="headingsmall">Designation</td>
          <td><input name="designation" type="text" class="style7" id="designation" size="38" /></td>
        </tr>
        <tr class="style9">
          <td><span class="headingsmall">Email <span class="invalid style1">*</span></span></td>
          <td><input name="email" type="text" class="style7" id="email" size="38" /></td>
        </tr>
        <tr class="style9">
          <td><span class="headingsmall">Phone Contact</span> </td>
          <td><input name="phone" type="text" class="style7" id="phone" size="38" /></td>
        </tr>
        <tr class="style9">
          <td valign="top" class="headingsmall">Address</td>
          <td><textarea name="address" cols="30" rows="5" class="style7" id="address"></textarea></td>
        </tr>
        <tr class="style9">
          <td valign="top" class="headingsmall">How would you categorize your &nbsp;message?</td>
          <td><input name="categorize" type="radio" value="Enquiries" />
      Enquiries<br />
      <input name="categorize" type="radio" value="Suggestions" />
      Suggestions<br />
      <input name="categorize" type="radio" value="Greetings" />
      Greetings<br>
      <input name="categorize" type="radio" value="Business Opportunities" />
      Business Opportunities<br />
      <input name="categorize" type="radio" value="Others" />
      Others</td>
        </tr>
        <tr class="style9">
          <td valign="top" class="headingsmall">Your Message</td>
          <td><textarea name="message" cols="30" rows="5" class="style7" id="message"></textarea></td>
        </tr>
        
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
        
        
        <tr class="style9">
          <td valign="top"> <div align="right"><span class="content_text"><?php echo $send;?></span></div></td>
          <td valign="top">
            <div align="left">
              <input type="submit" name="Submit" value="Submit" onclick="return check();" />
              <input name="reset" type="reset" id="reset" value="Reset" />
          </div></td>
        </tr>
      </table></td>
      <td background="images/05a.gif"><img src="images/05a.gif" width="10" height="100"></td>
    </tr>
    <tr>
      <td><img src="images/06a.gif" width="10" height="10"></td>
      <td background="images/07a.gif"><img src="images/07a.gif" width="500" height="10"></td>
      <td><img src="images/08a.gif" width="10" height="10"></td>
    </tr>
  </table>
</form>
</body>
</html>
