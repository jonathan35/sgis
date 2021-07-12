<?
$abc = 1;
$selected_query=mysqli_query($conn, "select * from home_section where id='$abc'");
$selected=mysqli_fetch_assoc($selected_query);
?>



<table height="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td width="587" align="center" valign="top"><table width="100%" border="0" cellspacing="8" cellpadding="0">
                <tr>
                  <td align="justify" valign="top" class="content_text">
                    <table width="0%" border="0" cellspacing="0" cellpadding="10">
                      <tr>
                        <td><?php echo str_replace("../../photo/","photo/",$selected['description']); ?></td>
                      </tr>
                    </table>
                  
                                        
                  </td>
                </tr>
              </table>

                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="justify" valign="top"><?php $home=1;include("custom_field_listing.php");//include("product_listing02.php");?></td>
                  </tr>
                </table></td>
              </tr>
          </table>