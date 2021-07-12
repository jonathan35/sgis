<?php require_once('../../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:login.php");
	}

if($_POST['delete']=='Delete'){
	$items_delete_array=$_POST['productIdList'];
	
	if(!empty($_POST['productIdList']))
	{
		foreach($items_delete_array as $items_delete)
		{
				mysqli_query($conn, "DELETE FROM inquiry_log where id='".$items_delete."'");
		}
	}
}
	
	
	
if($_POST['Submit']=='Reply'){ 

$query = mysqli_query($conn, "SELECT * FROM inquiry_log WHERE id='".$_GET['id']."'");
$client_email = mysqli_fetch_assoc($query);

$to='elizebert@webnyou.com';
$to2= $client_email['email02'];
$subject='Inbound Booking Form';
//$email=$_POST['email02'];
ini_set(SMTP, "mail.sarawakhost.com");
ini_set(smtp_port, "587");
ini_set(sendmail_from, $email);
$header = "MIME-Version: 1.0" . "\r\n";
$header.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
$header.= 'From: <Borneotours Booking Form>' . "\r\n";
$content.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Inbound Booking Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr><td>
<table width="100%"  border="0" align="center" cellpadding="4" cellspacing="6" bgcolor="#bddaef" class="content">
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="right">'.date("jS F Y").'</td>
</tr>
<tr class="style9">
<td>&nbsp;</td>
</tr>';
if($_POST['reply_message']!=''){
$content.='<tr>
<td width="100%" colspan="2">'.$_POST['reply_message'].'</td>
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

$send='<font color=#336600>Feedback sent</font>';

mysqli_query($conn, "UPDATE inquiry_log SET reply_status='1', date_posted_reply='".date("Y-m-d")."', time_reply='".date("g:i a")."' WHERE id='".$_GET['id']."' ");

}else
$send='<font color=#CC3300>Failed to send. Please try again.</font>';
}	
/*	
if($_GET['send']=='true')
{
	$mailto = $_POST['email'];
	$subject = "Enquiry Feedback from N-MO";

	$http_referrer = getenv( "HTTP_REFERER" );
	ini_set(SMTP, "smtp.gridmatrix.com.sg");
	ini_set(smtp_port,"25");
	//ini_set(sendmail_from, "info@caruswood.com.my");

	$price='Quoted Price (RM): '.$_POST['price'];
	$message=$_POST['message'];
	$date_posted=$_POST['date_posted'];
	$fname=$_POST['fname'];
	$pname=$_POST['pname'];
	$pcode=$_POST['pcode'];
	$quantity=$_POST['quantity'];
	
	$messageproper= '<style type="text/css">
					.style1 {
						color: #FFFFFF;
						font-weight: bold;
					}
					.style3 {font-family: Arial, Helvetica, sans-serif;
							font-size: 12px}
					</style>
					<link href="css/caruswood.css" rel="stylesheet" type="text/css">
					<style type="text/css">
					.style2 {font-family: Arial, Helvetica, sans-serif}
					</style><table width="630" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#660033">
					<tr align="center"><td>
					<table width="100%" border="0" align="center" cellpadding="1" cellspacing="4">
						<tr>
						  <td><img src="http://www.nmogrow.com/images/logo.jpg" width="175" height="38"></td>
						  </tr>
						<tr>
						<td bgcolor="#993300"><span class="style1 style2">YOUR PRODUCT ENQUIRY FEEDBACK FROM NMO GROW  </span></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td colspan="2" class="style3"><div>Product Code : '.$pcode.'</div></td></tr>
						<tr><td colspan="2" class="style3"><div>Product Name : '.$pname.'</div></td></tr>
						<tr><td colspan="2" class="style3"><div>Quantity : '.$quantity.'</div></td></tr>
						<tr><td colspan="2">&nbsp;</td>
						</tr>
						<tr>
						<td>
						<div class="style3">Dear '.$fname.'<br><br>
						<p>you have enquired for the above product on '.$date_posted.'.</p>
						</div>
						<div align="left"><br>
							<span class="style3">'.$price.'</span>
						  <br>
						  <span class="style3">
						  '.$message.'
						  </span><br>
						  <br>
						  <br>
						</div></td>
						</tr>
						<tr><td class="style3" align="left">For More Information Please Contact Us at Tel:082-338098 Fax:082-348112  </td></tr>	
					</table>
					</td></tr></table>';
					
	if(mail($mailto, $subject, $messageproper,"MIME-Version: 1.0\n"."Content-type: text/html; charset=iso-8859-1"))
	   {
	   		mysqli_query($conn, "UPDATE inquiry_log SET status=1, date_posted_reply='".date_posted("Y-m-d")."', time_reply='".date_posted("g:i:s")."', adminmessage='".$_POST['message']."', quoteprice='".$_POST['price']."' WHERE id='".$_GET['id']."' ");
			$send='success'; 
	   }
	 else 
	   {
			$send='fail';
	   }
}	

*/
if($_GET['read']=='yes')
{
	mysqli_query($conn, "UPDATE inquiry_log SET readunread='1' WHERE id='".$_GET['id']."' ");
}
	
if($_GET['st']==-1)
$query = "SELECT * FROM inquiry_log WHERE status=0 ORDER BY date_posted DESC";
else if($_GET['st']==1)
$query = "SELECT * FROM inquiry_log WHERE status=1 ORDER BY date_posted ASC";
else
$query = "SELECT * FROM inquiry_log ORDER BY name ASC";

$currentPage = $_SERVER["PHP_SELF"];	
$maxRows_Rs1 = 6;
$pageNum_Rs1 = 0;
if(!empty($_GET['pageNum_Rs1'])) {
  $pageNum_Rs1 = $_GET['pageNum_Rs1'];
}
$startRow_Rs1 = $pageNum_Rs1 * $maxRows_Rs1;

$colname_Rs1 = "";
mysqli_select_db($conn, $database_pamconnection);

$query_limit_Rs1 = sprintf("%s LIMIT %d, %d", $query, $startRow_Rs1, $maxRows_Rs1);
$Rs1 = mysqli_query($conn, $query_limit_Rs1) or die(mysqli_error());
$row_Rs1 = mysqli_fetch_assoc($Rs1);

if(!empty($_GET['totalRows_Rs1'])) {
  $totalRows_Rs1 = $_GET['totalRows_Rs1'];
} else {
  $all_Rs1 = mysqli_query($conn, $query);
  $totalRows_Rs1 = mysqli_num_rows($all_Rs1);
  
}
$totalPages_Rs1 = ceil($totalRows_Rs1/$maxRows_Rs1)-1;

$queryString_Rs1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
	if (stristr($param, "pageNum_Rs1") == false && 
		stristr($param, "totalRows_Rs1") == false) {
	  array_push($newParams, $param);
	}
  }
  if (count($newParams) != 0) {
	$queryString_Rs1 = "&" . htmlentities(implode("&", $newParams));
  }
}	





				$check=mysqli_query($conn, "SELECT id FROM inquiry_log WHERE status=1");
				$total=mysqli_num_rows($check);

				$check2=mysqli_query($conn, "SELECT id FROM inquiry_log WHERE status=0");
				$total2=mysqli_num_rows($check2);

?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="JavaScript" src="../js/bbcode.js"></script>
<script language="JavaScript" src="../js/validate_posted.js"></script>
<script language="JavaScript" src="../js/message.js"></script>
<script language="javascript" src="../js/menuAtNews.js"></script>

<title>Welcome to Web And You Web Solutions</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/component.css" rel="stylesheet" type="text/css">
<link href="../css/font.css" rel="stylesheet" type="text/css">
<link href="../css/layout.css" rel="stylesheet" type="text/css">
<link href="../../css/caruswood.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {font-size: 10px;
	font-family: Verdana;
}
.style4 {color: #0000CC}
-->
</style>
<script language="javascript">
function errorCheck()
{
	if(ProductPostForm.name.value=="")
	{
		alert("Please enter product name for product.");
		ProductPostForm.name.focus();
		return false;
	}
	return true;
}
function findItem(n, d)
{
	var p,x,i;
	if(!d) d=document;
	if((p=n.indexOf("?"))>0&&parent.frames.length)
	{
		d=parent.frames[n.substring(p+1)].document;
		n=n.substring(0,p);
	}
	if(!(x=d[n])&&d.all)
		x=d.all[n];
	for (i=0;!x&&i<d.forms.length;i++)
		x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++)
		x=findItem(n,d.layers[i].document);
	return x;
}

</script>
<script language="JavaScript">
function chkAll(frm, arr, mark)
{
  for (i = 0; i <= frm.elements.length; i++)
  {
   try
   {
     if(frm.elements[i].name == arr)
	 {
       frm.elements[i].checked = mark;
     }
   } catch(er) {}
  }
}
</script>


</head>

<body><img src="../images/cmservice.jpg" width="800" height="50">
<table width="799" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="2">
	<div align="left">
          <div id="title">
            <div id="titlename"><span class="white_title">PRODUCT </span></div>
            <div class="shadow"></div>
        </div>	
	</div></td>
  </tr>
  <tr>

      <td align="left" valign="top">	<?php include("../menu.php");?>
</td>
    <td rowspan="4" align="left" valign="top">
<!--main category -->	
<table width="630" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="288" align="left" valign="top">
	<table width="630" align="left" cellpadding="0"  cellspacing="0">
       	<tr>
			<td colspan="5" bgcolor="#CCCCCC" align="center"><div class="main_title"><br>PRODUCT ENQUIRY RECORDS<br><br></div></td>
		</tr>
	    <tr>
          <td width="636" height="244" align="left" valign="top">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr> </tr>
              <tr>
                <td></td>
              </tr>
			   <tr>
				<td colspan="2" class="company_name">
				<table width="600"  border="0">
					<?php if($send=='success') {?>
					<tr>
					  <td class="form_bold" align="center"><font color="#006633">Reply Sent..!!</font></td>
					</tr>
					<?php } if($send=='fail') {?>
					<tr>
					  <td class="company_name" align="center"><font color="#FF0000" class="form_red">Fail to sent reply..!! Please try again</font></td>
					</tr>
					<?php } ?>
                    
    <?php if($send!=''){?>
                <tr>
                  <td class="style7"><div style="border:1px #090 solid; background-color:#E3FEDA; padding:5px;"><?php echo $send?></div></td>
                </tr>
    <?php }?>                    
                    
				</table></td>
			  </tr>

              <tr>
                <td>
                
              <form name="ProductListForm2" method="post" action="product_enquiry.php">
                <script>
			  	function deleteProduct2()
				{
						var id= new Array('productIdList[]');
						if(id=='')
						{
							alert("No Item Selected");
							return false;
						}
				
					var point=confirm("Are You Sure You Want To Delete?");
					if(point==true)
					{
						return true;
					}
					else
					{
						return false;
					}
					
				}

			  </script>
                
                  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td colspan="3" class="main_title" align="left">&nbsp;<font color="#666666">
                        <?php if($_GET['st']==1){ echo '<br>Product Enquiry That Has Been Replied';}elseif($_GET['st']==-1){ echo '<br>Product Enquiry That Has Not Been Replied';}?>
                      </font></td>
                    </tr>
  <tr>
    <td colspan="5">
<div class="content"> Select
                  <input type="checkbox" name="checkbox" value="checkbox" checked disabled>
                  to:
                  <input type="submit" name="delete" value="Delete" onClick="return deleteProduct2();" title="Delete selected item(s)" />
                </div>    
    
    </td>
  </tr>

                    
                    
                    <tr bgcolor="#E1E1E1">
						
                        <th width="4%" class="content">
                            <input name="Input" type="checkbox" value="" onClick="chkAll(this.form, 'productIdList[]', this.checked)">                          </th>
						  <td width="14%" class="main_title"><div align="center">Read / Unread</div></td>
						  <td width="40%" class="main_title"><div align="center">Status</div></td>
						  <td width="16%" class="main_title"><div align="center">Enquire by </div></td>
						  <td width="13%" class="main_title"><div align="center">Date</div></td>
						  <td width="13%" class="main_title"><div align="center">Time</div></td>
						  
                    </tr>
                    <?php if($row_Rs1!='') { do{
				  ?>
                    <tr>
                    <td width="4%" class="content"><input type="checkbox" value="<?php echo $row_Rs1['id']; ?>" name="productIdList[]">                     </td>
                      <td align="center">
                        <?php if($row_Rs1['readunread']==0){?>
                        <a href="product_enquiry.php?st=<?php echo $_GET['st'];?>&read=yes&id=<?php echo $row_Rs1['id']?>"><img src="../images/unread.gif" width="25" height="20" border="0"></a>
                        <?php }if($row_Rs1['readunread']==1){?>
                        <a href="product_enquiry.php?st=<?php echo $_GET['st'];?>&read=yes&id=<?php echo $row_Rs1['id']?>"></a><a href="product_enquiry.php?st=<?php echo $_GET['st'];?>&read=yes&id=<?php echo $row_Rs1['id']?>"><img src="../images/read.gif" width="27" height="20" border="0"></a>
                        <?php }?>
                      </td>
                      <td align="left" class="content" style="font-size:11px;">
                        <?php if($row_Rs1['reply_status']==''){ echo '<img src="../images/icon-alert-transparent.gif" width="15" height="10" border="0">&nbsp;<strong>Not Replied</strong>';}
					if($row_Rs1['reply_status']==1)
					{echo '<img src="../images/icon_chosen.gif" width="15" height="15" border="0">&nbsp;';
					echo 'Replied on '.$row_Rs1['date_posted_reply'].',&nbsp;'.' at '.$row_Rs1['time_reply'];
					}?></td>
                      <td align="center" class="content"><?php echo $row_Rs1['title'].'&nbsp;'.$row_Rs1['name'].'&nbsp;'.$row_Rs1['lastname'].'<br>'?></td>
                      <td align="center" class="content"><?php echo $row_Rs1['date_posted']?></td>
                      <td align="center" class="content"><?php echo $row_Rs1['time']?></td>
                    </tr>
                    <?php }while($row_Rs1 = mysqli_fetch_assoc($Rs1)); } else {?>
                    <tr>
                      <td align="left" class="main_title" colspan="4"><br>
            &nbsp;<font color="#FF0000">No Product Enquiry Found </font></td>
                    </tr>
                    <?php }?>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">
                        <table>
                          <tr>
                            <td colspan="4"><div align="left" class="content">
                                <?php if ($totalRows_Rs1 > 0 ) { ?>
                    Total Records <?php echo ($startRow_Rs1 + 1) ?> to <?php echo min($startRow_Rs1 + $maxRows_Rs1, $totalRows_Rs1) ?> of <?php echo $totalRows_Rs1 ?> </div>
                                <p align="left" class="content"> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, 0, $queryString_Rs1); ?>">First</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, max(0, $pageNum_Rs1 - 1), $queryString_Rs1); ?>">| Previous</a> | <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, min($totalPages_Rs1, $pageNum_Rs1 + 1), $queryString_Rs1); ?>">Next</a> <a href="<?php printf("%s?pageNum_Rs1=%d%s", $currentPage, $totalPages_Rs1, $queryString_Rs1); ?>">| Last</a> |
                                    <?php } ?>
                              </td>
                          </tr>
                      </table></td>
                    </tr>
                </table>
                
                </form>
                </td>
              </tr>
            </table>
            <h2 class="content"><span class="style3"><br>
            </span></h2></td>
        </tr>
		<?php if($_GET['read']=='yes')
		{
		$record_query=mysqli_query($conn, "SELECT * FROM inquiry_log WHERE id='".$_GET['id']."' ");
		$record_set=mysqli_fetch_assoc($record_query);
		?>
		<tr>
			<td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                
                
                
<table width="100%" border="0" cellpadding="4" cellspacing="6">
      <tr>
        <td class="content"><?php include("customer_info.php");?></td>
      </tr>
      
      <tr>
        <td class="content"><?php include("reply.php");?></td>
      </tr>      

</table>                
                
                
                
                
                </td>
              </tr>
            </table>

		
        
        
        	
			</td>			
		</tr>
		<?php }?>
		<!--end showing enquiry-->
        <tr>
          <td height="45" valign="bottom" class="style3">
			<div align="center">
              <table width="100%"  border="0" class="greybg">
                <tr>
                  <td height="26"><div align="center" class="style3">&copy;Copyright of WebAndYou<br>
                      contact web and you <a href="mailto:support@webnyou.com">project administrator </a>for further assistance. </div></td>
                </tr>
              </table>
          	</div>
		  </td>
        </tr>
    </table></td>
  </tr>
</table>		
	<!--third category chck--></td>
  </tr>
  <tr>
    <td width="169" align="left" valign="top"> </td>
  </tr>
  <tr>
    <td align="left" valign="top">
	<!--menu-->
	<!--menu-->		
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; width:200px; height:46px; z-index:1; left: 752px; top: 4px;">
<table width="200" cellspacing="2" cellpadding="2">
  <tr>
	<td class="main_title">| <a href="../authentication/logout2.php"> Sign Out</a> |</td>
  </tr>
</table>
</div>
</body>
</html>
