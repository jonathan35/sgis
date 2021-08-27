<?
$selected_query=mysqli_query($conn, "select * from home_section where id=4");
$selected=mysqli_fetch_assoc($selected_query);

$selected_query2=mysqli_query($conn, "select * from home_section where id=5");
$selected2=mysqli_fetch_assoc($selected_query2);

if($selected2['description']!='' && file_exists($selected2['description']))
 $bg = 'background="'.$selected2['description'].'"';
 else
 $bg = 'background="bg_b.jpg"';

?>

<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="css.css" rel="stylesheet" type="text/css"><table width="940"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="940"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="980"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              
              <td align="center" valign="top" background="images/btm_main.jpg" <?php echo $bg;?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                
                 
                  <td align="right" valign="top">
                   <table width="100%" cellpadding="0" cellspacing="0" align="left" valign="top"><tr><td width="87%"><a href="#top"><img src="images/space.gif" width="20" height="20" border="0" /></a></td><td width="13%"><div align="right"><a href="#top"><img src="images/space.gif" width="130" height="40" border="0" /><br />
                   </a></div></td></tr></table>   
                      </td></tr><tr><td>
                      
                      
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="6">
                      <tr>
                        <td width="49%" align="left" class="copyright"><div align="left">Copyright &copy; SGIS Certification (Malaysia) Sdn. Bhd. Best viewed using <a href="http://www.mozilla.org" target="_new">Firefox</a> or <a href="http://www.google.com/chrome" target="_new">Chrome</a>.<a href="http://webnyou.com/quotation" target="_new"><br />
                        </a></div></td>
                        <td width="31%" align="center" class="copyright"><span>
                          <?php include("counter.php");?>
                          </span></td>
                        <td width="20%" align="left"><div align="right" class="copyright"><a href="result.php?root=NDI=">Home</a> | <a href="result.php?root=NDI=">Disclaimer</a> | <a href="#" class="style1" onclick="MM_openBrWindow('feedback.php','Feedback','scrollbars=yes,resizable=yes,width=550,height=630')">Feedback</a></div></td>
                      </tr>
                      </table>
                    <a href="#top">                  </a></td>
                  </tr>
                </table>
            <tr>
              <td align="center" valign="top" bgcolor="#FFFFFF" <?php echo $bg;?>><img src="images/space.gif" width="20" height="20" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
