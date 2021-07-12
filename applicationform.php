<?php require_once("Connections/pamconnection.php");
if($_POST['Submit']=='Submit'){
	
	
	if($_FILES['pdf_file']!='')
	{
		$fileatt = $HTTP_POST_FILES['pdf_file']['tmp_name'];
		$fileatt_type = $HTTP_POST_FILES['pdf_file']['type']; 
		$file_name = $HTTP_POST_FILES['pdf_file']['name'];
		$ext = substr(strrchr($fileatt_type, "/"), 1);
		switch ( $ext )
		{ 
			case 'pdf':
				$fileatt_name = $file_name;
				break;
			case 'msword': 
				$fileatt_name = $file_name;
				break;
			case 'vnd.openxmlformats-officedocument.wordprocessingml.document': 
				$fileatt_name = $file_name;
				break; 
		}
	}	
	
$email_from = "Outbound Booking Form"; // Who the email is from 
$email_subject = "BorneoTours Booking Form"; // The Subject of the email 
$email_message.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<tr class="style9">
<td>&nbsp;</td>
</tr>';

if($_POST['tour']!=''){
$email_message.='<tr class="style9">
<td width="32%" class="title02">Tour Package Name</td>
<td width="68%" class="email_message">'.$_POST['tour'].'</td>
</tr>';}

//if($_POST['title']!=''){
//$email_message.='<tr class="style9">
//<td width="32%" class="title02">Title</td>
//<td width="68%" class="email_message">'.$_POST['title'].'</td>
//</tr>';}

$email_message.='
<tr class="style9"><td colspan="2" class="title" bgcolor="#FFFFFF"><strong>CONTACT DETAILS</strong></td></tr>';

if($_POST['name']!=''){
$email_message.='<tr class="style9">
<td width="32%" class="title02">Name</td>
<td width="68%" class="email_message">'.$_POST['name'].'</td>
</tr>';}
if($_POST['contact']!=''){
$email_message.='<tr class="style9">
<td class="title02">Contact Person</td>
<td class="email_message">'.$_POST['contact'].'</td>
</tr>';}
if($_POST['email02']!=''){
$email_message.='<tr class="style9">
<td class="title02">Email Address</td>
<td class="email_message">'.$_POST['email02'].'</td>
</tr>';}
if($_POST['phone']!=''){
$email_message.='<tr class="style9">
<td class="title02">Phone Number</td>
<td class="email_message">'.$_POST['phone'].'</td>
</tr>';}
if($_POST['fax']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Fax Number</td>
<td class="email_message">'.$_POST['fax'].'<br><br></td>
</tr>';}


$email_message.='
<tr class="style9"><td colspan="2" class="title" bgcolor="#FFFFFF"><strong>TRIP REQUIREMENTS</strong></td></tr>';
if($_POST['travel']!=''){
$email_message.='<tr class="style9">
<td class="title02">Date Of Travel</td>
<td class="email_message">'.$_POST['travel'].'</td>
</tr>';}
$email_message.='
<tr class="style9"><td colspan="2" class="title02">No.Of Travellers :</td></tr>';
if($_POST['no_adult']!=''){
$email_message.='<tr class="style9">
<td class="title02">Adults</td>
<td class="email_message">'.$_POST['no_adult'].'</td>
</tr>';}
if($_POST['no_children']!=''){
$email_message.='<tr class="style9">
<td width="32%" valign="top" class="title02">Children</td>
<td width="68%" class="email_message">'.$_POST['no_children'].'</td>
</tr>';}
if($_POST['special_interest']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Special Interest</td>
<td class="email_message">'.$_POST['special_interest'].'</td>
</tr>';}
if($_POST['product_requirement']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Product Requirement</td>
<td class="email_message">'.$_POST['product_requirement'].'</td>
</tr>';}
if($_POST['foc_allocation']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">FOC Allocation</td>
<td class="email_message">'.$_POST['foc_allocation'].'<br><br></td>
</tr>';}


$email_message.='
<tr class="style9"><td colspan="2" class="title" bgcolor="#FFFFFF"><strong>ACCOMMODATION & MEAL REQUIREMENTS</strong></td></tr>';
if($_POST['standard_acc']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Standard of Accommodation</td>
<td class="email_message">'.$_POST['standard_acc'].'</td>
</tr>';}
if($_POST['meals']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Meal Requirements</td>
<td class="email_message">'.$_POST['meals'].'</td>
</tr>';}
if($_POST['meals1']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Meal Requirements</td>
<td class="email_message">'.$_POST['meals1'].'</td>
</tr>';}
if($_POST['meals2']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Meal Requirements</td>
<td class="email_message">'.$_POST['meals2'].'</td>
</tr>';}

$email_message.='
<tr class="style9"><td colspan="2" class="title02">Room Types Required:</td></tr>';
if($_POST['single']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Single</td>
<td class="email_message">'.$_POST['single'].'</td>
</tr>';}
if($_POST['double']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Double</td>
<td class="email_message">'.$_POST['double'].'</td>
</tr>';}
if($_POST['triple']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Triple</td>
<td class="email_message">'.$_POST['triple'].'</td>
</tr>';}
if($_POST['special_requirement']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Special Requirement</td>
<td class="email_message">'.$_POST['special_requirement'].'<br><br></td>
</tr>';}


$email_message.='
<tr class="style9"><td colspan="2" class="title" bgcolor="#FFFFFF"><strong>ITINERARY</strong></td></tr>';
if($_POST['pdf_file']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Itinerary File</td>
<td class="email_message">'.$_POST['pdf_file'].'</td>
</tr>';}
if($_POST['itinerary']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Itinerary</td>
<td class="email_message">'.$_POST['itinerary'].'<br><br></td>
</tr>';}


$email_message.='
<tr class="style9"><td colspan="2" class="title" bgcolor="#FFFFFF"><strong>FLIGHTS</strong></td></tr>';
if($_POST['date02']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Date Of Flights</td>
<td class="email_message">'.$_POST['date02'].'</td>
</tr>';}
if($_POST['class_travel']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Class Of Travel</td>
<td class="email_message">'.$_POST['class_travel'].'</td>
</tr>';}


if($_POST['flight_detail']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Flight Details</td>
<td class="email_message">'.$_POST['flight_detail'].'</td>
</tr>';}

if($_POST['airlines']!=''){
$email_message.='<tr class="style9">
<td valign="top" class="title02">Preferred Of Airlines</td>
<td class="email_message">'.$_POST['airlines'].'</td>
</tr>';}

$email_message.='<tr class="style9">
<td colspan="2" valign="top"><div align="center">
	</div></td>
</tr>
</table>
</td></tr></table></body>
</html>';

$email_to = "ee_elizebert@hotmail.com"; // Who the email is to 
ini_set(SMTP, "mail.sarawakhost.com");
ini_set(smtp_port, "587");
ini_set(sendmail_from, $email);
$headers = "From: ".$email_from; 


$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
fclose($file); 

$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

$headers .= "\nMIME-Version: 1.0\n" . 
"Content-Type: multipart/mixed;\n" . 
" boundary=\"{$mime_boundary}\""; 

$email_message .= "This is a multi-part message in MIME format.\n\n" . 
"--{$mime_boundary}\n" . 
"Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . 
$email_message .= "\n\n"; 

$email_message .= "--{$mime_boundary}\n" . 
"Content-Type: {$fileatt_type};\n" . 
" name=\"{$fileatt_name}\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . 
$data .= "\n\n" . 
"--{$mime_boundary}--\n"; 


$ok = mail($email_to, $email_subject, $email_message, $headers); 

if($ok) { 
$send='<font color=#336600>Feedback sent</font>';
} else { 
$send='<font color=#CC3300>Failed to send. Please try again.</font>';
} 		
	
	
	
	}?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Outbound Booking Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
body {
	background-image: url(images/booking.jpg);
	background-repeat:repeat-x;
}
-->
</style>
</head>
<script>
function check()
{
	if(document.form1.position.value==''){alert("Please enter your post. Thank You."); document.form1.position.focus(); return false;}
	if(document.form1.name.value==''){alert("Please enter your name. Thank You."); document.form1.name.focus(); return false;}
	if(document.form1.pdf_file.value==''){alert("Please browse your attachment. Thank You."); document.form1.pdf_file.focus(); return false;}
	if(document.form1.email2.value==''){alert("Please enter your email address. Thank You."); document.form1.email2.focus(); return false;}
	if(document.form1.email2.value.indexOf('@')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email2.focus(); return false;}
	if(document.form1.email2.value.indexOf('.')==-1){alert("Invalid email address. Please enter a valid email address. Thank You."); document.form1.email2.focus(); return false;}
	
}
//<![CDATA[
		window.addEvent('domready', function() { 
			myCal2 = new Calendar({ date02: 'd/m/Y' }, { classes: ['dashboard'], direction: 1, tweak: {x: 3, y: -3} });
		});
		window.addEvent('domready', function() { 
			myCal2 = new Calendar({ date03: 'd/m/Y' }, { classes: ['dashboard'], direction: 1, tweak: {x: 3, y: -3} });
		});
	//]]>
</script> 
    
<script type="text/javascript" src="mootools.v1.11.js"></script>
<script type="text/javascript" src="DatePicker.js"></script>
<script type="text/javascript">
window.addEvent('domready', function(){

	$$('input.DatePicker').each( function(el){
		new DatePicker(el);
	});

});
</script> 
</script>
<link href="css.css" rel="stylesheet" type="text/css" />
							<?php if($send!=''){?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><?php echo $send?></td>
                              </tr>
                            </table>
                            <?php }?>
          
<form name="form1" method="post" action="applicationform.php" enctype="multipart/form-data">
   <table width="100%" border="0" cellspacing="4" cellpadding="2">
  <tr>
    <td align="left" valign="middle" colspan="2"><p class="title3"><?php echo $send;?></td>
  </tr>
<tr>
    <td align="left" valign="middle" colspan="2"><?php include("form_feature_tools.php");?></td>
  </tr>
  <tr>
    <td width="17%"  valign="middle" class="title6"><div align="right">Tour Package Name</div></td>
     <td width="83%" align="left" class="heading4">
	 <?php echo $_GET['tour']; if($_GET['code']!='') echo " (".$_GET['code'].")";?>
     <input type="hidden" name="tour" value="<?php echo $_GET['tour']; if($_GET['code']!='') echo " (".$_GET['code'].")";?>" />
     </td>
  </tr>
 
 <!-- <tr>
    <td width="27%" align="left" valign="middle" class="title6"><div align="right">Title <span class="content_text3">*</span></div></td>
    <td width="73%" align="left" valign="middle" class="title3"><select name="title" id="title" value="<?php echo $_POST['title']?>">
     <option value=""></option>
      <option value="Mr." <?php if($_POST['title']=="Mr."){?> selected="selected"<?php }?>>Mr.</option>
      <option value="Mrs." <?php if($_POST['title']=="Mrs."){?> selected="selected"<?php }?>>Mrs.</option>
      <option value="Ms." <?php if($_POST['title']=="Ms."){?> selected="selected"<?php }?>>Ms.</option>
      <option value="Mdm." <?php if($_POST['title']=="Mdm."){?> selected="selected"<?php }?>>Mdm.</option>
      <option value="Dr." <?php if($_POST['title']=="Dr."){?> selected="selected"<?php }?>>Dr.</option>
    </select></td>
  </tr>!-->
  <tr>
    <td align="left" valign="middle"><div align="right"><strong class="title6"><br />
      CONTACT DETAILS</strong></div></td>
    <td align="left" valign="middle" class="title6">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Name <span class="content_text3">*</span> </span></div></td>
    <td align="left" valign="middle"><span class="title6">
      <input name="name" type="text" class="style7" id="name" size="30" value="<?php echo $_POST['name']?>" />
    </span></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="title6"><div align="right">Contact Person<span class="content_text3">*</span></div></td>
    <td align="left" valign="middle" class="title6"><input name="contact" type="text" class="style7" id="contact" size="30" value="<?php echo $_POST['contact']?>"/></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Email Address<span class="content_text3">*</span></span></div></td>
    <td align="left" valign="middle"><input name="email02" type="text" class="style7" id="email02" size="30" value="<?php echo $_POST['email02']?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Phone Number</span></div></td>
    <td align="left" valign="middle"><label>
      <input type="text" name="phone" id="phone" class="style7" value="<?php echo $_POST['phone']?>"/>
    </label></td>
  </tr>
<tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Fax Number</span></div></td>
    <td align="left" valign="middle"><label>
      <input type="text" name="fax" id="fax" class="style7" value="<?php echo $_POST['fax']?>"/>
    </label></td>
  </tr>
 <tr>
    <td align="left" valign="middle"><div align="right"><strong class="title6"><br />
      TRIP REQUIREMENTS</strong></div></td>
    <td align="left" valign="middle" class="title6">&nbsp;</td>
  </tr>
 <!-- <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Country / Nation</span></div></td>
    <td align="left" valign="middle"><select  name="country" value="<?php echo $_POST['country']?>">
      <option value="Afghanistan" <?php if($_POST['country']=="Afghanistan"){?> selected="selected"<?php }?>>Afghanistan</option>
      <option value="Albania" <?php if($_POST['country']=="Albania"){?> selected="selected"<?php }?>>Albania</option>
      <option value="Algeria" <?php if($_POST['country']=="Algeria"){?> selected="selected"<?php }?>>Algeria</option>
      <option value="American Samoa" <?php if($_POST['country']=="American Samoa"){?> selected="selected"<?php }?>>American Samoa</option>
      <option value="Andorra" <?php if($_POST['country']=="Andorra"){?> selected="selected"<?php }?>>Andorra</option>
      <option value="Angola" <?php if($_POST['country']=="Angola"){?> selected="selected"<?php }?>>Angola</option>
      <option value="Anguilla" <?php if($_POST['country']=="Anguilla"){?> selected="selected"<?php }?>>Anguilla</option>
      <option value="Antarctica" <?php if($_POST['country']=="Antarctica"){?> selected="selected"<?php }?>>Antarctica</option>
      <option value="Antigua and Barbuda" <?php if($_POST['country']=="Antigua and Barbuda"){?> selected="selected"<?php }?>>Antigua and Barbuda</option>
      <option value="Argentina" <?php if($_POST['country']=="Argentina"){?> selected="selected"<?php }?>>Argentina</option>
      <option value="Armenia" <?php if($_POST['country']=="Armenia"){?> selected="selected"<?php }?>>Armenia</option>
      <option value="Aruba" <?php if($_POST['country']=="Aruba"){?> selected="selected"<?php }?>>Aruba</option>
      <option value="Australia" <?php if($_POST['country']=="Australia"){?> selected="selected"<?php }?>>Australia</option>
      <option value="Austria" <?php if($_POST['country']=="Austria"){?> selected="selected"<?php }?>>Austria</option>
      <option value="Azerbaijan" <?php if($_POST['country']=="Azerbaijan"){?> selected="selected"<?php }?>>Azerbaijan</option>
      <option value="Bahamas" <?php if($_POST['country']=="Bahamas"){?> selected="selected"<?php }?>>Bahamas</option>
      <option value="Bahrain" <?php if($_POST['country']=="Bahrain"){?> selected="selected"<?php }?>>Bahrain</option>
      <option value="Bangladesh" <?php if($_POST['country']=="Bangladesh"){?> selected="selected"<?php }?>>Bangladesh</option>
      <option value="Barbados" <?php if($_POST['country']=="Barbados"){?> selected="selected"<?php }?>>Barbados</option>
      <option value="Belarus" <?php if($_POST['country']=="Belarus"){?> selected="selected"<?php }?>>Belarus</option>
      <option value="Belgium" <?php if($_POST['country']=="Belgium"){?> selected="selected"<?php }?>>Belgium</option>
      <option value="Belize" <?php if($_POST['country']=="Belize"){?> selected="selected"<?php }?>>Belize</option>
      <option value="Benin" <?php if($_POST['country']=="Benin"){?> selected="selected"<?php }?>>Benin</option>
      <option value="Bermuda" <?php if($_POST['country']=="Bermuda"){?> selected="selected"<?php }?>>Bermuda</option>
      <option value="Bhutan" <?php if($_POST['country']=="Bhutan"){?> selected="selected"<?php }?>>Bhutan</option>
      <option value="Bolivia" <?php if($_POST['country']=="Bolivia"){?> selected="selected"<?php }?>>Bolivia</option>
      <option value="Bosnia Hercegovina" <?php if($_POST['country']=="Bosnia Hercegovina"){?> selected="selected"<?php }?>>Bosnia Hercegovina</option>
      <option value="Botswana" <?php if($_POST['country']=="Botswana"){?> selected="selected"<?php }?>>Botswana</option>
      <option value="Bouvet Island" <?php if($_POST['country']=="Bouvet Island"){?> selected="selected"<?php }?>>Bouvet Island</option>
      <option value="Brazil" <?php if($_POST['country']=="Brazil"){?> selected="selected"<?php }?>>Brazil</option>
      <option value="British Indian Ocean Territory" <?php if($_POST['country']=="British Indian Ocean Territory"){?> selected="selected"<?php }?>>British Indian Ocean Territory</option>
      <option value="Brunei Darussalam" <?php if($_POST['country']=="Brunei Darussalam"){?> selected="selected"<?php }?>>Brunei Darussalam</option>
      <option value="Bulgaria" <?php if($_POST['country']=="Bulgaria"){?> selected="selected"<?php }?>>Bulgaria</option>
      <option value="Burkina Faso" <?php if($_POST['country']=="Burkina Faso"){?> selected="selected"<?php }?>>Burkina Faso</option>
      <option value="Burundi" <?php if($_POST['country']=="Burundi"){?> selected="selected"<?php }?>>Burundi</option>
      <option value="Cambodia" <?php if($_POST['country']=="Cambodia"){?> selected="selected"<?php }?>>Cambodia</option>
      <option value="Cameroon" <?php if($_POST['country']=="Cameroon"){?> selected="selected"<?php }?>>Cameroon</option>
      <option value="Canada" <?php if($_POST['country']=="Canada"){?> selected="selected"<?php }?>>Canada</option>
      <option value="Cape Verde" <?php if($_POST['country']=="Cape Verde"){?> selected="selected"<?php }?>>Cape Verde</option>
      <option value="Cayman Islands" <?php if($_POST['country']=="Cayman Islands"){?> selected="selected"<?php }?>>Cayman Islands</option>
      <option value="Central African Republic" <?php if($_POST['country']=="Central African Republic"){?> selected="selected"<?php }?>>Central African Republic</option>
      <option value="Chad" <?php if($_POST['country']=="Chad"){?> selected="selected"<?php }?>>Chad</option>
      <option value="CL" <?php if($_POST['country']=="CL"){?> selected="selected"<?php }?>>Chile</option>
      <option value="Chile" <?php if($_POST['country']=="Chile"){?> selected="selected"<?php }?>>China</option>
      <option value="Christmas" <?php if($_POST['country']=="Christmas"){?> selected="selected"<?php }?>>Christmas Island</option>
      <option value="Cocos" <?php if($_POST['country']=="Cocos"){?> selected="selected"<?php }?>>Cocos (Keeling) Islands</option>
      <option value="Colombia" <?php if($_POST['country']=="Colombia"){?> selected="selected"<?php }?>>Colombia</option>
      <option value="Comoros" <?php if($_POST['country']=="Comoros"){?> selected="selected"<?php }?>>Comoros</option>
      <option value="Congo" <?php if($_POST['country']=="Congo"){?> selected="selected"<?php }?>>Congo</option>
      <option value="Cook" <?php if($_POST['country']=="Cook"){?> selected="selected"<?php }?>>Cook Islands</option>
      <option value="Costa" <?php if($_POST['country']=="Costa"){?> selected="selected"<?php }?>>Costa Rica</option>
      <option value="Cote D'ivoire" <?php if($_POST['country']=="Cote D'ivoire"){?> selected="selected"<?php }?>>Cote D'ivoire</option>
      <option value="Croatia" <?php if($_POST['country']=="Croatia"){?> selected="selected"<?php }?>>Croatia</option>
      <option value="Cuba" <?php if($_POST['country']=="Cuba"){?> selected="selected"<?php }?>>Cuba</option>
      <option value="Cyprus" <?php if($_POST['country']=="Cyprus"){?> selected="selected"<?php }?>>Cyprus</option>
      <option value="Czech" <?php if($_POST['country']=="Czech"){?> selected="selected"<?php }?>>Czech Republic</option>
      <option value="Denmark" <?php if($_POST['country']=="Denmark"){?> selected="selected"<?php }?>>Denmark</option>
      <option value="Djibouti" <?php if($_POST['country']=="Djibouti"){?> selected="selected"<?php }?>>Djibouti</option>
      <option value="Dominica" <?php if($_POST['country']=="Dominica"){?> selected="selected"<?php }?>>Dominica</option>
      <option value="Dominican" <?php if($_POST['country']=="Dominican"){?> selected="selected"<?php }?>>Dominican Republic</option>
      <option value="East" <?php if($_POST['country']=="East"){?> selected="selected"<?php }?>>East Timor</option>
      <option value="Ecuador" <?php if($_POST['country']=="Ecuador"){?> selected="selected"<?php }?>>Ecuador</option>
      <option value="Egypt" <?php if($_POST['country']=="Egypt"){?> selected="selected"<?php }?>>Egypt</option>
      <option value="EL" <?php if($_POST['country']=="EL"){?> selected="selected"<?php }?>>EL Salvador</option>
      <option value="Equatorial" <?php if($_POST['country']=="Equatorial"){?> selected="selected"<?php }?>>Equatorial Guinea</option>
      <option value="Eritrea" <?php if($_POST['country']=="Eritrea"){?> selected="selected"<?php }?>>Eritrea</option>
      <option value="Estonia" <?php if($_POST['country']=="Estonia"){?> selected="selected"<?php }?>>Estonia</option>
      <option value="Ethiopia" <?php if($_POST['country']=="Ethiopia"){?> selected="selected"<?php }?>>Ethiopia</option>
      <option value="Falkland" <?php if($_POST['country']=="Falkland"){?> selected="selected"<?php }?>>Falkland Islands (Malvinas)</option>
      <option value="Faroe" <?php if($_POST['country']=="Faroe"){?> selected="selected"<?php }?>>Faroe Islands</option>
      <option value="Fiji" <?php if($_POST['country']=="Fiji"){?> selected="selected"<?php }?>>Fiji</option>
      <option value="Finland" <?php if($_POST['country']=="Finland"){?> selected="selected"<?php }?>>Finland</option>
      <option value="France" <?php if($_POST['country']=="France"){?> selected="selected"<?php }?>>France</option>
      <option value="French Guiana" <?php if($_POST['country']=="French Guiana"){?> selected="selected"<?php }?>>French Guiana</option>
      <option value="French Polynesia" <?php if($_POST['country']=="French Polynesia"){?> selected="selected"<?php }?>>French Polynesia</option>
      <option value="French Southern Territories" <?php if($_POST['country']=="French Southern Territories"){?> selected="selected"<?php }?>>French Southern Territories</option>
      <option value="Gabon" <?php if($_POST['country']=="Gabon"){?> selected="selected"<?php }?>>Gabon</option>
      <option value="Gambia" <?php if($_POST['country']=="Gambia"){?> selected="selected"<?php }?>>Gambia</option>
      <option value="Georgia" <?php if($_POST['country']=="Georgia"){?> selected="selected"<?php }?>>Georgia</option>
      <option value="Germany" <?php if($_POST['country']=="Germany"){?> selected="selected"<?php }?>>Germany</option>
      <option value="Ghana" <?php if($_POST['country']=="Ghana"){?> selected="selected"<?php }?>>Ghana</option>
      <option value="Gibraltar" <?php if($_POST['country']=="Gibraltar"){?> selected="selected"<?php }?>>Gibraltar</option>
      <option value="Greece" <?php if($_POST['country']=="Greece"){?> selected="selected"<?php }?>>Greece</option>
      <option value="Greenland" <?php if($_POST['country']=="Greenland"){?> selected="selected"<?php }?>>Greenland</option>
      <option value="Grenada" <?php if($_POST['country']=="Grenada"){?> selected="selected"<?php }?>>Grenada</option>
      <option value="Guadeloupe" <?php if($_POST['country']=="Guadeloupe"){?> selected="selected"<?php }?>>Guadeloupe</option>
      <option value="Guam" <?php if($_POST['country']=="Guam"){?> selected="selected"<?php }?>>Guam</option>
      <option value="Guatemala" <?php if($_POST['country']=="Guatemala"){?> selected="selected"<?php }?>>Guatemala</option>
      <option value="Guinea" <?php if($_POST['country']=="Guinea"){?> selected="selected"<?php }?>>Guinea</option>
      <option value="Guinea-Bissau" <?php if($_POST['country']=="Guinea-Bissau"){?> selected="selected"<?php }?>>Guinea-Bissau</option>
      <option value="Guyana" <?php if($_POST['country']=="Guyana"){?> selected="selected"<?php }?>>Guyana</option>
      <option value="Haiti" <?php if($_POST['country']=="Haiti"){?> selected="selected"<?php }?>>Haiti</option>
      <option value="Heard and Mc Donald Islands" <?php if($_POST['country']=="Heard and Mc Donald Islands"){?> selected="selected"<?php }?>>Heard and Mc Donald Islands</option>
      <option value="Honduras" <?php if($_POST['country']=="Honduras"){?> selected="selected"<?php }?>>Honduras</option>
      <option value="Hong Kong" <?php if($_POST['country']=="Hong Kong"){?> selected="selected"<?php }?>>Hong Kong</option>
      <option value="Hungary" <?php if($_POST['country']=="Hungary"){?> selected="selected"<?php }?>>Hungary</option>
      <option value="Iceland" <?php if($_POST['country']=="Iceland"){?> selected="selected"<?php }?>>Iceland</option>
      <option value="India" <?php if($_POST['country']=="India"){?> selected="selected"<?php }?>>India</option>
      <option value="Indonesia" <?php if($_POST['country']=="Indonesia"){?> selected="selected"<?php }?>>Indonesia</option>
      <option value="Iran" <?php if($_POST['country']=="Iran"){?> selected="selected"<?php }?>>Iran</option>
      <option value="Iraq" <?php if($_POST['country']=="Iraq"){?> selected="selected"<?php }?>>Iraq</option>
      <option value="Ireland" <?php if($_POST['country']=="Ireland"){?> selected="selected"<?php }?>>Ireland</option>
      <option value="Israel" <?php if($_POST['country']=="Israel"){?> selected="selected"<?php }?>>Israel</option>
      <option value="Italy" <?php if($_POST['country']=="Italy"){?> selected="selected"<?php }?>>Italy</option>
      <option value="Jamaica" <?php if($_POST['country']=="Jamaica"){?> selected="selected"<?php }?>>Jamaica</option>
      <option value="Japan" <?php if($_POST['country']=="Japan"){?> selected="selected"<?php }?>>Japan</option>
      <option value="Jordan" <?php if($_POST['country']=="Jordan"){?> selected="selected"<?php }?>>Jordan</option>
      <option value="Kazakhstan" <?php if($_POST['country']=="Kazakhstan"){?> selected="selected"<?php }?>>Kazakhstan</option>
      <option value="Kenya" <?php if($_POST['country']=="Kenya"){?> selected="selected"<?php }?>>Kenya</option>
      <option value="Kiribati" <?php if($_POST['country']=="Kiribati"){?> selected="selected"<?php }?>>Kiribati</option>
      <option value="Korea (North)" <?php if($_POST['country']=="Korea (North)"){?> selected="selected"<?php }?>>Korea (North)</option>
      <option value="Korea (South)" <?php if($_POST['country']=="Korea (South)"){?> selected="selected"<?php }?>>Korea (South)</option>
      <option value="Kuwait" <?php if($_POST['country']=="Kuwait"){?> selected="selected"<?php }?>>Kuwait</option>
      <option value="Kyrgyzstan" <?php if($_POST['country']=="Kyrgyzstan"){?> selected="selected"<?php }?>>Kyrgyzstan</option>
      <option value="Laos" <?php if($_POST['country']=="Laos"){?> selected="selected"<?php }?>>Laos</option>
      <option value="Latvia" <?php if($_POST['country']=="Latvia"){?> selected="selected"<?php }?>>Latvia</option>
      <option value="Lebanon" <?php if($_POST['country']=="Lebanon"){?> selected="selected"<?php }?>>Lebanon</option>
      <option value="Lesotho" <?php if($_POST['country']=="Lesotho"){?> selected="selected"<?php }?>>Lesotho</option>
      <option value="Liberia" <?php if($_POST['country']=="Liberia"){?> selected="selected"<?php }?>>Liberia</option>
      <option value="Libyan Arab Jamahiriya" <?php if($_POST['country']=="Libyan Arab Jamahiriya"){?> selected="selected"<?php }?>>Libyan Arab Jamahiriya</option>
      <option value="Liechtenstein" <?php if($_POST['country']=="Liechtenstein"){?> selected="selected"<?php }?>>Liechtenstein</option>
      <option value="Lithuania" <?php if($_POST['country']=="Lithuania"){?> selected="selected"<?php }?>>Lithuania</option>
      <option value="Luxembourg" <?php if($_POST['country']=="Luxembourg"){?> selected="selected"<?php }?>>Luxembourg</option>
      <option value="Macau" <?php if($_POST['country']=="Macau"){?> selected="selected"<?php }?>>Macau</option>
      <option value="Macedonia" <?php if($_POST['country']=="Macedonia"){?> selected="selected"<?php }?>>Macedonia</option>
      <option value="Madagascar" <?php if($_POST['country']=="Madagascar"){?> selected="selected"<?php }?>>Madagascar</option>
      <option value="Malawi" <?php if($_POST['country']=="Malawi"){?> selected="selected"<?php }?>>Malawi</option>
      <option value="Malaysia"  <?php if($_POST['country']=="Malaysia"){?> selected="selected"<?php }?>>Malaysia</option>
      <option value="Maldives" <?php if($_POST['country']=="Maldives"){?> selected="selected"<?php }?>>Maldives</option>
      <option value="Mali" <?php if($_POST['country']=="Mali"){?> selected="selected"<?php }?>>Mali</option>
      <option value="Malta" <?php if($_POST['country']=="Malta"){?> selected="selected"<?php }?>>Malta</option>
      <option value="Marshall Islands" <?php if($_POST['country']=="Marshall Islands"){?> selected="selected"<?php }?>>Marshall Islands</option>
      <option value="Martinique" <?php if($_POST['country']=="Martinique"){?> selected="selected"<?php }?>>Martinique</option>
      <option value="Mauritania" <?php if($_POST['country']=="Mauritania"){?> selected="selected"<?php }?>>Mauritania</option>
      <option value="Mauritius" <?php if($_POST['country']=="Mauritius"){?> selected="selected"<?php }?>>Mauritius</option>
      <option value="Mayotte" <?php if($_POST['country']=="Mayotte"){?> selected="selected"<?php }?>>Mayotte</option>
      <option value="Mexico" <?php if($_POST['country']=="Mexico"){?> selected="selected"<?php }?>>Mexico</option>
      <option value="Micronesia" <?php if($_POST['country']=="Micronesia"){?> selected="selected"<?php }?>>Micronesia</option>
      <option value="Monaco" <?php if($_POST['country']=="Monaco"){?> selected="selected"<?php }?>>Monaco</option>
      <option value="Mongolia" <?php if($_POST['country']=="Mongolia"){?> selected="selected"<?php }?>>Mongolia</option>
      <option value="Montserrat" <?php if($_POST['country']=="Montserrat"){?> selected="selected"<?php }?>>Montserrat</option>
      <option value="Morocco" <?php if($_POST['country']=="Morocco"){?> selected="selected"<?php }?>>Morocco</option>
      <option value="Mozambique" <?php if($_POST['country']=="Mozambique"){?> selected="selected"<?php }?>>Mozambique</option>
      <option value="Myanmar" <?php if($_POST['country']=="Myanmar"){?> selected="selected"<?php }?>>Myanmar</option>
      <option value="Nambia" <?php if($_POST['country']=="Nambia"){?> selected="selected"<?php }?>>Nambia</option>
      <option value="Nauru" <?php if($_POST['country']=="Nauru"){?> selected="selected"<?php }?>>Nauru</option>
      <option value="Nepal" <?php if($_POST['country']=="Nepal"){?> selected="selected"<?php }?>>Nepal</option>
      <option value="Netherlands" <?php if($_POST['country']=="Netherlands"){?> selected="selected"<?php }?>>Netherlands</option>
      <option value="Netherlands Antilles" <?php if($_POST['country']=="Netherlands Antilles"){?> selected="selected"<?php }?>>Netherlands Antilles</option>
      <option value="New Caledonia" <?php if($_POST['country']=="New Caledonia"){?> selected="selected"<?php }?>>New Caledonia</option>
      <option value="New Zealand" <?php if($_POST['country']=="xxxx"){?> selected="selected"<?php }?>>New Zealand</option>
      <option value="Nicaragua" <?php if($_POST['country']=="Nicaragua"){?> selected="selected"<?php }?>>Nicaragua</option>
      <option value="Niger" <?php if($_POST['country']=="Niger"){?> selected="selected"<?php }?>>Niger</option>
      <option value="Nigeria" <?php if($_POST['country']=="Nigeria"){?> selected="selected"<?php }?>>Nigeria</option>
      <option value="Niue" <?php if($_POST['country']=="Niue"){?> selected="selected"<?php }?>>Niue</option>
      <option value="Norfolk Island" <?php if($_POST['country']=="Norfolk Island"){?> selected="selected"<?php }?>>Norfolk Island</option>
      <option value="Northern Mariana Islands" <?php if($_POST['country']=="Northern Mariana Islands"){?> selected="selected"<?php }?>>Northern Mariana Islands</option>
      <option value="Norway" <?php if($_POST['country']=="Norway"){?> selected="selected"<?php }?>>Norway</option>
      <option value="Oman" <?php if($_POST['country']=="Oman"){?> selected="Oman"<?php }?>>Oman</option>
      <option value="Others" <?php if($_POST['country']=="Others"){?> selected="selected"<?php }?>>Others</option>
      <option value="Pakistan" <?php if($_POST['country']=="Pakistan"){?> selected="selected"<?php }?>>Pakistan</option>
      <option value="Palau" <?php if($_POST['country']=="Palau"){?> selected="selected"<?php }?>>Palau</option>
      <option value="Palestinian Territory, Occupied" <?php if($_POST['country']=="Palestinian Territory, Occupied"){?> selected="selected"<?php }?>>Palestinian Territory, Occupied</option>
      <option value="Panama" <?php if($_POST['country']=="Panama"){?> selected="selected"<?php }?>>Panama</option>
      <option value="Papua New Guinea" <?php if($_POST['country']=="Papua New Guinea"){?> selected="selected"<?php }?>>Papua New Guinea</option>
      <option value="Paraguay" <?php if($_POST['country']=="Paraguay"){?> selected="selected"<?php }?>>Paraguay</option>
      <option value="Peru" <?php if($_POST['country']=="Peru"){?> selected="selected"<?php }?>>Peru</option>
      <option value="Philippines" <?php if($_POST['country']=="Philippines"){?> selected="selected"<?php }?>>Philippines</option>
      <option value="Pitcairn" <?php if($_POST['country']=="Pitcairn"){?> selected="selected"<?php }?>>Pitcairn</option>
      <option value="Poland" <?php if($_POST['country']=="Poland"){?> selected="selected"<?php }?>>Poland</option>
      <option value="Portugal" <?php if($_POST['country']=="Portugal"){?> selected="selected"<?php }?>>Portugal</option>
      <option value="Puerto Rico" <?php if($_POST['country']=="Puerto Rico"){?> selected="selected"<?php }?>>Puerto Rico</option>
      <option value="Qatar" <?php if($_POST['country']=="Qatar"){?> selected="selected"<?php }?>>Qatar</option>
      <option value="Republic Of Moldova" <?php if($_POST['country']=="Republic Of Moldova"){?> selected="selected"<?php }?>>Republic Of Moldova</option>
      <option value="Reunion" <?php if($_POST['country']=="Reunion"){?> selected="selected"<?php }?>>Reunion</option>
      <option value="Romania" <?php if($_POST['country']=="Romania"){?> selected="selected"<?php }?>>Romania</option>
      <option value="Russia" <?php if($_POST['country']=="Russia"){?> selected="selected"<?php }?>>Russia</option>
      <option value="Rwanda" <?php if($_POST['country']=="Rwanda"){?> selected="selected"<?php }?>>Rwanda</option>
      <option value="Saint Kitts And Nevis" <?php if($_POST['country']=="Saint Kitts And Nevis"){?> selected="selected"<?php }?>>Saint Kitts And Nevis</option>
      <option value="Saint Lucia" <?php if($_POST['country']=="Saint Lucia"){?> selected="selected"<?php }?>>Saint Lucia</option>
      <option value="Saint Vincent and The Grenadines" <?php if($_POST['country']=="Saint Vincent and The Grenadines"){?> selected="selected"<?php }?>>Saint Vincent and The Grenadines</option>
      <option value="Samoa" <?php if($_POST['country']=="Samoa"){?> selected="selected"<?php }?>>Samoa</option>
      <option value="San Marino" <?php if($_POST['country']=="San Marino"){?> selected="selected"<?php }?>>San Marino</option>
      <option value="Sao Tome and Principe" <?php if($_POST['country']=="Sao Tome and Principe"){?> selected="selected"<?php }?>>Sao Tome and Principe</option>
      <option value="Saudi Arabia" <?php if($_POST['country']=="Saudi Arabia"){?> selected="selected"<?php }?>>Saudi Arabia</option>
      <option value="Senegal" <?php if($_POST['country']=="Senegal"){?> selected="selected"<?php }?>>Senegal</option>
      <option value="Seychelles" <?php if($_POST['country']=="Seychelles"){?> selected="selected"<?php }?>>Seychelles</option>
      <option value="Sierra Leone" <?php if($_POST['country']=="Sierra Leone"){?> selected="selected"<?php }?>>Sierra Leone</option>
      <option value="Singapore" <?php if($_POST['country']=="Singapore"){?> selected="selected"<?php }?>>Singapore</option>
      <option value="Slovakia" <?php if($_POST['country']=="Slovakia"){?> selected="selected"<?php }?>>Slovakia</option>
      <option value="Slovenia" <?php if($_POST['country']=="Slovenia"){?> selected="selected"<?php }?>>Slovenia</option>
      <option value="Solomon Islands" <?php if($_POST['country']=="Solomon Islands"){?> selected="selected"<?php }?>>Solomon Islands</option>
      <option value="Somalia" <?php if($_POST['country']=="Somalia"){?> selected="selected"<?php }?>>Somalia</option>
      <option value="South Africa" <?php if($_POST['country']=="South Africa"){?> selected="selected"<?php }?>>South Africa</option>
      <option value="South Georgia And South Sandwich Islands" <?php if($_POST['country']=="outh Georgia And South Sandwich Islands"){?> selected="selected"<?php }?>>South Georgia And South Sandwich Islands</option>
      <option value="Spain" <?php if($_POST['country']=="Spain"){?> selected="selected"<?php }?>>Spain</option>
      <option value="Sri Lanka" <?php if($_POST['country']=="Sri Lanka"){?> selected="selected"<?php }?>>Sri Lanka</option>
      <option value="St. Helena" <?php if($_POST['country']=="St. Helena"){?> selected="selected"<?php }?>>St. Helena</option>
      <option value="St. Pierre and Miquelon" <?php if($_POST['country']=="St. Pierre and Miquelon"){?> selected="selected"<?php }?>>St. Pierre and Miquelon</option>
      <option value="Sudan" <?php if($_POST['country']=="Sudan"){?> selected="selected"<?php }?>>Sudan</option>
      <option value="Suriname" <?php if($_POST['country']=="Suriname"){?> selected="selected"<?php }?>>Suriname</option>
      <option value="Svalbard and Jan Mayen Islands" <?php if($_POST['country']=="Svalbard and Jan Mayen Islands"){?> selected="selected"<?php }?>>Svalbard and Jan Mayen Islands</option>
      <option value="Swaziland" <?php if($_POST['country']=="Swaziland"){?> selected="selected"<?php }?>>Swaziland</option>
      <option value="Sweden" <?php if($_POST['country']=="Sweden"){?> selected="selected"<?php }?>>Sweden</option>
      <option value="Switzerland" <?php if($_POST['country']=="Switzerland"){?> selected="selected"<?php }?>>Switzerland</option>
      <option value="Syrian Arab Republic" <?php if($_POST['country']=="Syrian Arab Republic"){?> selected="selected"<?php }?>>Syrian Arab Republic</option>
      <option value="Taiwan" <?php if($_POST['country']=="Taiwan"){?> selected="selected"<?php }?>>Taiwan</option>
      <option value="Tajikistan" <?php if($_POST['country']=="Tajikistan"){?> selected="selected"<?php }?>>Tajikistan</option>
      <option value="Tanzania" <?php if($_POST['country']=="Tanzania"){?> selected="selected"<?php }?>>Tanzania</option>
      <option value="Thailand" <?php if($_POST['country']=="Thailand"){?> selected="selected"<?php }?>>Thailand</option>
      <option value="TOGO" <?php if($_POST['country']=="TOGO"){?> selected="selected"<?php }?>>TOGO</option>
      <option value="Tokelau" <?php if($_POST['country']=="Tokelau"){?> selected="selected"<?php }?>>Tokelau</option>
      <option value="Tonga" <?php if($_POST['country']=="Tonga"){?> selected="selected"<?php }?>>Tonga</option>
      <option value="Trinidad and Tobago" <?php if($_POST['country']=="Trinidad and Tobago"){?> selected="selected"<?php }?>>Trinidad and Tobago</option>
      <option value="Tunisia" <?php if($_POST['country']=="Tunisia"){?> selected="selected"<?php }?>>Tunisia</option>
      <option value="Turkey" <?php if($_POST['country']=="Turkey"){?> selected="selected"<?php }?>>Turkey</option>
      <option value="Turkmenistan" <?php if($_POST['country']=="Turkmenistan"){?> selected="selected"<?php }?>>Turkmenistan</option>
      <option value="Turks and Caicos Islands" <?php if($_POST['country']=="urks and Caicos Islands"){?> selected="selected"<?php }?>>Turks and Caicos Islands</option>
      <option value="Tuvalu" <?php if($_POST['country']=="Tuvalu"){?> selected="selected"<?php }?>>Tuvalu</option>
      <option value="Uganda" <?php if($_POST['country']=="Uganda"){?> selected="selected"<?php }?>>Uganda</option>
      <option value="Ukraine" <?php if($_POST['country']=="Ukraine"){?> selected="selected"<?php }?>>Ukraine</option>
      <option value="United Arab Emirates" <?php if($_POST['country']=="United Arab Emirates"){?> selected="selected"<?php }?>>United Arab Emirates</option>
      <option value="United Kingdom" <?php if($_POST['country']=="United Kingdom"){?> selected="selected"<?php }?>>United Kingdom</option>
      <option value="United States" <?php if($_POST['country']=="United States"){?> selected="selected"<?php }?>>United States</option>
      <option value="United States Minor Outlying Islands" <?php if($_POST['country']=="United States Minor Outlying Islands"){?> selected="selected"<?php }?>>United States Minor Outlying Islands</option>
      <option value="Uruguay" <?php if($_POST['country']=="Uruguay"){?> selected="selected"<?php }?>>Uruguay</option>
      <option value="Uzbekistan" <?php if($_POST['country']=="Uzbekistan"){?> selected="selected"<?php }?>>Uzbekistan</option>
      <option value="Vanuatu" <?php if($_POST['country']=="Vanuatu"){?> selected="selected"<?php }?>>Vanuatu</option>
      <option value="Vatican City State (Holy See)" <?php if($_POST['country']=="Vatican City State (Holy See)"){?> selected="selected"<?php }?>>Vatican City State (Holy See)</option>
      <option value="Venezuela" <?php if($_POST['country']=="Venezuela"){?> selected="selected"<?php }?>>Venezuela</option>
      <option value="Vietnam" <?php if($_POST['country']=="Vietnam"){?> selected="selected"<?php }?>>Vietnam</option>
      <option value="Virgin Islands (British)" <?php if($_POST['country']=="Virgin Islands (British)"){?> selected="selected"<?php }?>>Virgin Islands (British)</option>
      <option value="Virgin Islands (U.S.)" <?php if($_POST['country']=="Virgin Islands (U.S.)"){?> selected="selected"<?php }?>>Virgin Islands (U.S.)</option>
      <option value="Wallis and Futuna Islands" <?php if($_POST['country']=="Wallis and Futuna Islands"){?> selected="selected"<?php }?>>Wallis and Futuna Islands</option>
      <option value="Yemen" <?php if($_POST['country']=="Yemen"){?> selected="selected"<?php }?>>Yemen</option>
      <option value="Yugoslavia" <?php if($_POST['country']=="Yugoslavia"){?> selected="selected"<?php }?>>Yugoslavia</option>
      <option value="Zaire" <?php if($_POST['country']=="Zaire"){?> selected="selected"<?php }?>>Zaire</option>
      <option value="Zambia" <?php if($_POST['country']=="Zambia"){?> selected="selected"<?php }?>>Zambia</option>
      <option value="Zimbabwe" <?php if($_POST['country']=="Zimbabwe"){?> selected="selected"<?php }?>>Zimbabwe</option>
    </select></td>
  </tr>!-->
 <!-- <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">Services Enquiry *</span></div></td>
    <td align="left" valign="middle"><span class="title6">
      <select name="services" id="services">
        <option value="">Please Select</option>
        <option value="Place of Interest">Place of Interest</option>
        <option value="Tour Packages">Tour Packages</option>
        <option value="Customise Tour">Customise Tour</option>
        <option value="Accommodation">Accommodation</option>
      </select>
    </span></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><div align="right"><span class="title6">No. of days for the trip</span></div></td>
    <td align="left" valign="middle"><input name="no_days" type="text" class="style7" id="no_days" value="<?php echo $_POST['no_days']?>" size="10" maxlength="5" /> <label>
      <select name="day" id="day" >
      <option value="days"<?php if($_POST['day']=="days"){?> selected="selected"<?php }?>>days</option>
       <option value="weeks"<?php if($_POST['day']=="weeks"){?> selected="selected"<?php }?>>weeks</option>
      </select>
    </label></td>
  </tr>!-->
  <tr valign="top">
    <td align="left" valign="top" class="title6"><div align="right">Date of Travel <span class="content_text3">*</span></div></td>
    <td align="left"><table width="731" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" width="33%" valign="top"><?php echo '<input id="travel" name="travel" style="width:50%" type="text" class="DatePicker" tabindex="1" value="'.date("m/d/Y", $tomorrow).'"/>';?></td>
        <td width="2%" align="left" valign="top"><img src="images/space.gif" width="15" height="20" /></td>
        <td width="19%" valign="top"><div align="left"><span class="title6">Product Requirements</span></div></td>
        <td><table width="100%" border="0">
          <tr>
            <td><span class="title6">
              <label>
                <div align="left">
                  <input type="radio" name="product_requirement" id="air" value="air and land" <?php if($_POST['product_requirement']=="air"){?> selected="selected"<?php }?>/>
                  Air & Land</div>
              </label>
            </span></td>
          </tr>
          <tr>
            <td><span class="title6">
              <label>
                <div align="left">
                  <input type="radio" name="product_requirement" id="land" value="land only"  <?php if($_POST['product_requirement']=="land"){?> selected="selected"<?php }?> />
                  Land Only</div>
              </label>
            </span></td>
          </tr>
        </table></td>
        
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><div  align="right"><span class="title6">
      No. of travellers</span></div></td>
    <td align="left" valign="middle">
      <table width="73%" border="0">
        <tr>
          <td width="10%" class="title6"><div align="left">Adult <span class="content_text3">*</span></div></td>
          <td width="24%"><label>
            <input type="text" name="no_adult" id="no_adult" value="<?php echo $_POST['no_adult']?>" />
          </label></td>
          <td width="15%" class="title6"><div align="left">FOC Allocation</div></td>
          <td width="51%"><label>
            <input type="text" name="foc_allocation" id="foc_allocation" value="<?php echo $_POST['foc_allocation']?>"/>
          </label></td>
           
        </tr>
        <tr>
          <td class="title6"><div align="left">Children<span class="content_text3"> *</span></div></td>
          <td><label>
            <input type="text" name="no_children" id="no_children" value="<?php echo $_POST['no_children']?>"/>
          </label></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          
        </tr>
      </table>
     
 </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="title6"><div align="right">Special Interest</div></td>
    <td align="left" valign="middle">
    <label>
        <textarea name="special_interest" id="special_interest" cols="30" rows="3"><?php echo $_POST['special_interest']?></textarea>
     
    </label></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle"><div align="left"><strong class="title6"><br />
      ACCOMMODATION & MEAL REQUIREMENTS</strong></div></td>
    </tr>
  <tr>
    <td align="left" valign="top" class="title6"><div align="right">Standard of Accommodation</div></td>
    <td align="left" valign="middle"><table width="100%" border="0">
      <tr>
        <td width="18%"><label>
          <select name="standard_acc" id="standard_acc" value="<?php echo $_POST['standard_acc']?>">
     <option value=""></option>
      <option value="budget" <?php if($_POST['standard_acc']=="budget"){?> selected="selected"<?php }?>>Budget</option>
      <option value="3_Star" <?php if($_POST['standard_acc']=="3_Star"){?> selected="selected"<?php }?>>3 Star</option>
      <option value="4_Star" <?php if($_POST['standard_acc']=="4_Star"){?> selected="selected"<?php }?>>4 Star</option>
      <option value="5_Star" <?php if($_POST['standard_acc']=="5_Star"){?> selected="selected"<?php }?>>5 Star</option>
    </select>
        </label></td>
        <td width="13%" class="title6"><div align="left">Meal Requirements</div></td>
        <td width="69%" class="title6"><label>
          <div align="left">
            <input type="checkbox" name="meals" id="breakfast" value="breakfast" <?php if($_POST['meals']=="breakfast"){?> selected="selected"<?php }?>/>
            Breakfast</div>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="title6"><label>
          <div align="left">
            <input type="checkbox" name="meals1" id="lunch" value="lunch"<?php if($_POST['meals1']=="lunch"){?> selected="selected"<?php }?>/>
            Lunch</div>
        </label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td class="title6"><label>
          <div align="left">
            <input type="checkbox" name="meals2" id="dinner" value="dinner"<?php if($_POST['meals2']=="dinner"){?> selected="selected"<?php }?>/>
            Dinner</div>
        </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="title6"><div align="right">Room Types Required</div></td>
    <td align="left" valign="middle"><table width="99%" border="0">
      <tr>
        <td width="7%" class="title6"><div align="right">Single</div></td>
        <td width="18%"><label>
          <input type="text" name="single" id="single" value="<?php echo $_POST['single']?>" />
        </label></td>
        <td width="16%" class="title6"><div align="right">Special Requirements</div></td>
        <td width="59%" rowspan="3"><label>
          <textarea name="special_requirement" id="special_requirement" cols="30" rows="3"><?php echo $_POST['special_requirement'] ?></textarea>
        </label></td>
      </tr>
      <tr>
        <td class="title6"><div align="right">Double</div></td>
        <td><label>
          <input type="text" name="double" id="double" value="<?php echo $_POST['double']?>"/>
        </label></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td class="title6"><div align="right">Triple</div></td>
        <td><label>
          <input type="text" name="triple" id="triple" value="<?php echo $_POST['triple']?>" />
        </label></td>
        <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
   <tr>
    <td align="left" valign="middle"><div align="right"><strong class="title6"><br />
      ITINERARY</strong></div></td>
    <td align="left" valign="middle" class="title6">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><div align="right"><span class="title6">Upload Itinerary</span></div></td>
     <td align="left"> <input name="pdf_file" type="file" id="pdf_file">
 <span class="title10"><br />
 </span><span class="title3">Browse for file (.doc or .pdf only)</span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><div align="right"><span class="title6">Or Enter Itinerary here</span></div></td>
    <td align="left" valign="middle"><span class="title6">
      <label>
        <textarea name="itinerary" id="itinerary" cols="30" rows="3"><?php echo $_POST['itinerary']?></textarea>
        </label>
      </span></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><div align="right"><strong class="title6"><br />
      FLIGHTS</strong></div></td>
    <td align="left" valign="middle" class="title6">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td align="left" valign="top" class="title6"><div align="right">Date Of Flight</div></td>
    <td align="left"><table width="50%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" width="65%" valign="top"><?php echo '<input id="date02" name="date02" style="width:50%" type="text" class="DatePicker" tabindex="1" value="'.date("m/d/Y", $tomorrow).'"/>';?></td>
        <td align="left" valign="top"><img src="images/space.gif" width="15" height="20" /></td>
        <td valign="top"><div align="left"><span class="title6">Flight Details</span></div></td>
        <td><img src="images/space.gif" width="10" height="20" /></td>
        <td valign="top"><div align="left"><input name="flight_detail" type="text" class="style7" id="flight_detail" size="8" value="<?php echo $_POST['flight_detail']?>"/></div></td>
      </tr>
    </table></td>
  </tr>
  <!--<tr valign="top">
    <td align="left" valign="top" class="title6"><div align="right">Departure Date</div></td>
    <td align="left"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td width="65%" align="left" valign="middle"><?php echo '<input id="date03" name="date03" style="width:50%" type="text" class="DatePicker" tabindex="1"  value="'.date("m/d/Y", $next_day).'"/>';?></td>
        <td align="left" valign="top"><img src="images/space.gif" width="15" height="20" /></td>
        <td><span class="title6">Flight No.</span></td>
        <td><img src="images/space.gif" width="10" height="20" /></td>
        <td><input name="flight_no_d" type="text" class="style7" id="name11" size="8" value="<?php echo $_POST['flight_no_d']?>"/></td>
      </tr>
    </table></td>
  </tr>!-->
  <tr valign="top">
    <td align="left" class="title6"><div align="right">Class Of Travel</div></td>
    <td align="left"><table width="100%" border="0">
      <tr>
        <td width="33%"><label>
         <select name="class_travel" id="class_travel" value="<?php echo $_POST['class_travel']?>">
     <option value=""></option>
      <option value="special/promotion" <?php if($_POST['class_travel']=="special/promotion"){?> selected="selected"<?php }?>>Special/Promotion</option>
      <option value="economy_class" <?php if($_POST['class_travel']=="economy_class"){?> selected="selected"<?php }?>>Economy Class</option>
      <option value="business_class" <?php if($_POST['class_travel']=="business_class"){?> selected="selected"<?php }?>>Business Class</option>
      <option value="first_class" <?php if($_POST['class_travel']=="first_class"){?> selected="selected"<?php }?>>First Class</option>
    </select>
        </label></td>
        <td width="15%" class="title6"><div align="left">Preference Of Airline</div></td>
        <td width="52%"><label>
          <input type="text" name="airlines" id="airlines" value="<?php echo $_POST['airlines']?>" />
        </label></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="title3">&nbsp;</td>
    <td align="left" valign="middle"><table width="80%" border="0" cellpadding="2" cellspacing="2">
      <tr>
        <td width="45%">&nbsp;</td>
        <td width="5%" align="center"><input name="reset" type="reset" id="reset" value="Reset"/></td>
        <td width="5%" align="center"><input type="Submit" name="Submit" value="Submit" onclick="return booknow();" /></td>
        <td width="45%">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  </table>
</form>
</body>
</html>
