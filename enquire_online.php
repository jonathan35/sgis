<?
require_once('Connections/pamconnection.php'); 

	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$url = $parts[count($parts) - 1];		

if($_GET['ac']!=''){
	$inbound_id=mysqli_real_escape_string($conn, base64_decode($_GET['ac']));
  	$in_query=mysqli_query($conn, "select * from cruises_product where status='1' ");
	$in_query_set=mysqli_fetch_assoc($in_query);
}
	

if($_POST['Submit']=='Submit'){
$to='jonathan@webnyou.com';
//$to2='online@wahtung.travel';
$subject='Accommodation Booking Form';
$email=$_POST['email'];
ini_set(SMTP, "mail.sarawakhost.com");
ini_set(smtp_port, "587");
ini_set(sendmail_from, $email);
$header = "MIME-Version: 1.0" . "\r\n";
$header.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
$header.= 'From: <Website Visitor>' . "\r\n";
$content.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Accommodation Booking Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
.title{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; }
.content{ font-family:Verdana, Arial, Helvetica, sans-serifl; font-size:12px;}
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; color: #FFFFFF; }
</style>
<body>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#cccccc">
  <tr><td>
<table width="100%"  border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#BBD2FF" class="content">
<tr>
<td colspan="2" bgcolor="#09F">
<span style="font:Times New Roman, Times, serif; font-size:18px; color:#036; text-shadow:1px 1px 1px #FFF;">
<strong>Accommodation Booking Form</strong></span>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="right">'.date("jS F Y").'</td>
</tr>
<tr class="style9">
<td>&nbsp;</td>
</tr>
<tr class="style9" bgcolor="#003366"><td colspan="2">Travel Details</td></tr>';

if($_POST['departure']!=''){
$content.='<tr class="style9">
<td>Departing From</td>
<td width="68%">'.$_POST['departure'].'</td>
</tr>';}
if($_POST['destination']!=''){
$content.='<tr class="style9">
<td>Destination </td>
<td width="68%">'.$_POST['destination'].'</td>
</tr>';}
if($_POST['departure_date']!=''){
$content.='<tr class="style9">
<td>Departure Date </td>
<td width="68%">'.$_POST['departure_date'].'</td>
</tr>';}
if($_POST['return_date']!=''){
$content.='<tr class="style9"
<td>Return Date </td>
<td width="68%">'.$_POST['return_date'].'</td>
</tr>';}
if($_POST['no_travallers']!=''){
$content.='<tr class="style9">
<td>No. of travallers </td>
<td width="68%">'.$_POST['no_travallers'].'</td>
</tr>';}
if($_POST['comment']!=''){
$content.='<tr class="style9">
<td>Comment </td>
<td width="68%">'.$_POST['comment'].'</td>
</tr>';}
$content.='<tr class="style9" bgcolor="#003366"><td colspan="2">Personal Details</td></tr>';

if($_POST['first_name']!=''){
$content.='<tr class="style9">
<td>First Name </td>
<td width="68%">'.$_POST['first_name'].'</td>
</tr>';}
if($_POST['last_name']!=''){
$content.='<tr class="style9">
<td>Last Name </td>
<td width="68%">'.$_POST['last_name'].'</td>
</tr>';}
if($_POST['phone']!=''){
$content.='<tr class="style9">
<td>Phone </td>
<td width="68%">'.$_POST['phone'].'</td>
</tr>';}
if($_POST['email1']!=''){
$content.='<tr class="style9">
<td>E-mail address </td>
<td width="68%">'.$_POST['email1'].'</td>
</tr>';}
if($_POST['postcode']!=''){
$content.='<tr class="style9">
<td>Postcode </td>
<td width="68%">'.$_POST['postcode'].'</td>
</tr>';}
if($_POST['contact_via']!=''){
$content.='<tr class="style9">
<td>Contact me Via </td>
<td width="68%">'.$_POST['contact_via'].'</td>
</tr>';}
if($_POST['sign_up']!=''){
$content.='<tr class="style9">
<td>Sign up for deals? </td>
<td width="68%">'.$_POST['sign_up'].'</td>
</tr>';}



$content.='<tr class="style9">
<td colspan="2" valign="top"><div align="center">
	</div></td>
</tr>
</table>
</td></tr></table></body>
</html>';

if(mail($to, $subject, $content, $header)){
//mail($to2, $subject, $content, $header);
//mail($to3, $subject, $content, $header);
$send='<font color=#336600>Feedback sent</font>';
}else
$send='<font color=#CC3300>Failed to send. Please try again.</font>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="menu.css" rel="stylesheet" />
<link type="text/css" href="css.css" rel="stylesheet" />

<link href="DatePicker.css" type="text/css" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" />

<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script type="text/javascript" src="mootools.v1.11.js"></script>
<script type="text/javascript" src="DatePicker.js"></script>
<script type="text/javascript">
window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});
</script> 

<script>
function check()
{
	if(document.form1.no_travallers.value==''){alert("Please enter no. of travellers."); document.form1.no_travallers.focus(); return false;}
	if(document.form1.first_name.value==''){alert("Please enter your first name."); document.form1.first_name.focus(); return false;}
	if(document.form1.last_name.value==''){alert("Please enter your last name."); document.form1.last_name.focus(); return false;}
	if(document.form1.phone.value==''){alert("Please enter your phone no.."); document.form1.phone.focus(); return false;}
	if(document.form1.email1.value==''){alert("Please enter your e-mail."); document.form1.email1.focus(); return false;}
	if(document.form1.email2.value==''){alert("Please enter your e-mail confirm."); document.form1.email2.focus(); return false;}
	if(document.form1.email1.value!=document.form1.email2.value){alert("Please enter the email confirm same as email."); document.form1.email2.focus(); return false;}
	if(document.form1.postcode.value==''){alert("Please enter your postcode."); document.form1.postcode.focus(); return false;}

if(document.form1.email2.value==''){alert("Please enter your email address."); document.form1.email2.focus(); return false;}
	if(document.form1.email2.value.indexOf('@')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email2.focus(); return false;}
	if(document.form1.email2.value.indexOf('.')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email2.focus(); return false;}
	if(document.form1.cantact_via.value==''){alert("Please select your contact method."); document.form1.cantact_via.focus(); return false;}
	
	
	return true;
}

</script>

</head>




<body style="margin:0px; right:50%; top:0px;">
<table width="380"  border="0" cellspacing="0" cellpadding="0" align="center" background="images/bg_main01.jpg">
<tr>
    <td background="images/bg_main01.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left"><div align="left"><img src="images/01.gif" width="10" height="10" /></div></td>
        <td><img src="images/space.gif" width="20" height="10" /></td>
        <td align="right"><div align="right"><img src="images/02.gif" width="10" height="10" /></div></td>
      </tr>
      <tr>
        <td colspan="3" valign="top"><div align="center"><span class="navigationtop">ENQUIRE ONLINE</span></div></td>
      </tr>
      <tr>
        <td colspan="3" valign="top" background="images/line03.gif"><div align="center"><img src="images/space.gif" width="400" height="5" /></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#D4E3FF">
    
<form name="form1" action="cruises_enquiry02.php" method="post">
    <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">  
      <tr>
        <td align="right">
          <div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="6" background="images/bg_list02.gif">

    
    <?php if($send!=''){?>
    <tr>
      <td align="center" valign="middle" class="style5" colspan="2"><?php echo $send;?></td>
      </tr>
    <?php }?>
    <tr>
      
      <td width="333" align="left">
        
        <table width="600" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td colspan="3" align="left" valign="top"><img src="images/point.gif" width="10" height="10"> <span class="content_text6">Indicates a required field</span></td>
            </tr>
          <tr>
            <td width="300" align="left" valign="top" class="heading3">Travel Details</td>
            <td width="3" rowspan="2" align="center" valign="top" class="enquire_bg"><img src="images/space.gif" width="3" height="200"></td>
            <td width="300" align="left" valign="top" class="heading3">Personal Details</td>
            </tr>
          <tr>
            <td width="50%" align="left" valign="top"><table border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="114" align="left" valign="top" class="content_text"><span class="content_text6">Departing from</span></td>
                <td align="left" valign="top"><input name="departure" type="text" id="textfield" size="20"></td>
                </tr>
              <tr>
                <td width="114" align="left" valign="top" class="content_text">Destination</td>
                <td align="left" valign="top"><input name="destination" type="text" id="textfield2" size="20"></td>
                </tr>
              <tr>
                <td width="114" align="left" valign="top" class="content_text">Departing date</td>
                <td align="left" valign="top"><input name="departure_date" type="text" id="textfield3" size="20"></td>
                </tr>
              <tr>
                <td width="114" align="left" valign="top" class="content_text">Return date</td>
                <td align="left" valign="top"><input name="return_date" type="text" id="textfield4" size="20"></td>
                </tr>
              <tr>
                <td width="114" align="left" valign="top" class="content_text">No. of travellers <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="no_travallers" type="text" id="textfield5" size="20"></td>
                </tr>
              <tr>
                <td width="114" align="left" valign="top" class="content_text">Comments</td>
                <td align="left" valign="top"><label>
                  <textarea name="comment" id="textarea" cols="18" rows="3"></textarea>
                  </label></td>
                </tr>
              </table></td>
            <td width="50%" align="left" valign="top"><table border="0" cellspacing="2" cellpadding="0">
              <tr>
                <td width="114" align="left" valign="top" class="content_text">First name <img src="images/point.gif" width="10" height="10"></td>
                <td width="120" align="left" valign="top"><input name="first_name" type="text" id="textfield6" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Last name <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="last_name" type="text" id="textfield7" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Phone <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="phone" type="text" id="textfield8" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Email address <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="email1" type="text" id="textfield9" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Email confirm <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="email2" type="text" id="textfield10" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Postcode <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><input name="postcode" type="text" id="textfield11" size="20"></td>
                </tr>
              <tr>
                <td align="left" valign="top" class="content_text">Contact me via <img src="images/point.gif" width="10" height="10"></td>
                <td align="left" valign="top"><span class="content_text" id="sprycheckbox1">
                  <input type="checkbox" name="contact_via" id="checkbox1" value="Email">
  </span><span class="content_text">Email&nbsp;&nbsp;&nbsp;<span id="sprycheckbox2">
    <input type="checkbox" name="contact_via" id="checkbox2" value="Phone">
    </span>Phone</span></td>
                </tr>
              <tr>
                <td colspan="2" align="left" valign="top" class="content_text">Sign up for deals? 
                  <input type="checkbox" name="sign_up" id="checkbox3" value="Yes"></td>
                </tr>
              <tr>
                <td colspan="2" align="left" valign="top" class="content_text"><img src="images/space.gif" width="20" height="10"></td>
                </tr>
              <tr>
                <td colspan="2" align="right" valign="top" class="content_text">
                </td>
                </tr>
              </table></td>
            </tr>
          </table>             
        
        
        
        </td>
      </tr>                  
                <tr>
              <td align="right" style="padding-right:22px; padding-bottom:20px;">
             
                <input type="submit" name="Submit" value="Submit" onclick="return check();" />
                

              </td>
            </tr>
    
    </table>
            </div></td>
      </tr>
      <tr>
        <td align="right"><div align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
        


          </table>
        </div></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
