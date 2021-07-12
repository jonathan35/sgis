<?
require_once('Connections/pamconnection.php');  
	if($_POST['submit']==' Submit ')
	{
		
		$news = mysqli_real_escape_string($conn, base64_decode($_GET['news']));
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$comment = mysqli_real_escape_string($conn, $_POST['comment']);
		$date_posted = date("Y-m-d");
		if(mysqli_query($conn, "INSERT INTO news_feedback ( id, news_id, contributer_name, contributer_email, comment, status, date) 
		values ('', '".$news."', '".$name."', '".$email."', '".$comment."', '0', '".$date_posted."')"))	{	
			$success='<font color="#336600">Comment sent succesfully.</font>';
			$email='1';
		}else{
			$success='<font color="#CC3300">Failed to sent comment, please try again.</font>';
		}
		
		if($email=='1'){
			

$to='crocker@chemsain.com';
$to2='bc@chemsain.com';
$to3='adrian.richard@chemsain.com';
$subject = 'Comment On News';
$email = $_POST['email'];
ini_set(SMTP, "mail.sarawakhost.com");
ini_set(smtp_port, "587");
ini_set(sendmail_from, $email);
$header = "MIME-Version: 1.0" . "\r\n";
$header.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
$header.= 'From: <Website Visitor>' . "\r\n";

$content.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<!--<style>
.title{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; }
.content{ font-family:Verdana, Arial, Helvetica, sans-serifl; font-size:12px;}
</style>-->
<body>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr><td>
<table width="100%"  border="0" align="center" cellpadding="4" cellspacing="6" bgcolor="#DCE1E9" class="content">
<tr>
<td colspan="2" class="title">Online Feedback Form</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="right">'.date("jS F Y").'</td>
</tr>
<tr>
<td colspan="2" align="right" style="font:Arial, Helvetica, sans-serif; color:#999; font-size:12px;">Some one comment on the news section at http://www.murumseia.com.my</td>
</tr>

<tr class="style9">
<td>&nbsp;</td>
</tr>';
if($_POST['name']!=''){
$content.='<tr class="style9">
<td width="32%">Name</td>
<td width="68%">'.$_POST['name'].'</td>
</tr>';}
if($_POST['email']!=''){
$content.='<tr class="style9">
<td>E-mail </td>
<td>'.$_POST['email'].'</td>
</tr>';}
if($_POST['comment']!=''){
$content.='<tr class="style9">
<td>Comment</td>
<td>'.$_POST['comment'].'</td>
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
mail($to3, $subject, $content, $header);
$send='<font color=#336600>Feedback sent</font>';
}else
$send='<font color=#CC3300>Failed to send. Please try again.</font>';
			
			
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function check(form1)
{
	if(form1.name.value=="")
	{
		alert("Please enter your name.");
		form1.name.focus();
		return false;
	}
	if(form1.email.value=="")
	{
		alert("Please enter your email.");
		form1.email.focus();
		return false;
	}
	if(document.form1.email.value.indexOf('@')==-1)
	{
		alert("Invalid email address. Please enter a valid email address.");
		document.form1.email.focus();
		return false;
	}
	if(document.form1.email.value.indexOf('.')==-1)
	{
		alert("Invalid email address. Please enter a valid email address.");
		document.form1.email.focus();
		return false;
	}	
	
	if(form1.comment.value=="")
	{
		alert("Please enter your comment.");
		form1.comment.focus();
		return false;
	}		
	return true;
}
</script>

</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td>
    
<form name="form1" method="post" action="news_comment.php?news=<?php echo $_GET['news']?>" >
                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                  <tr><td class="heading3">Leave a comment</td></tr>
                  <tr>
                  	<td class="content_price04"><span class="content_text6">Name</span><br>
<input type="text" name="name" maxlength="30" style="width:300px; border:solid 2px #CEDFF0; font:Arial, Helvetica, sans-serif; color:#69C; font-size:12px; padding:2px;">
                    </td>
                </tr>
                  <tr>
                  <td class="content_price04"><span class="content_text6">Email (will not be published)</span><br>
                  
<input type="text" name="email" maxlength="30" style="width:300px; border:solid 2px #CEDFF0; font:Arial, Helvetica, sans-serif; color:#69C; font-size:12px; padding:2px;">
                    </td>
                  </tr>
                  <tr>
                  <td class="content_price04"><span class="content_text6">Comment</span><br>
<textarea name="comment" style="width:300px; height:120px; border:solid 2px #CEDFF0; font:Arial, Helvetica, sans-serif; color:#69C; font-size:12px; padding:2px;"></textarea>
                    </td>
                 </tr>
                 
                  <tr>
                    <td class="content_text">
                         <input type="submit" name="submit" value=" Submit " onClick="return check(form1);" style="width:100px; color:#069; font-size:15px;  padding:2px 2px 2px 2px;">&nbsp;&nbsp; <?php echo $success;?>
                    </td>
                  </tr>                

                  <tr>
                    <td>
                        <img src="images/space.gif" height="5" width="5">
                    </td>
                  </tr>

                  <tr>
                    <td>
                        <img src="images/space.gif" height="5" width="5">
                    </td>
                  </tr>
                </table>
                </form>



    </td>
  </tr>
</table>




</body>
</html>