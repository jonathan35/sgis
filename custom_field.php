
<table width="93%" border="0" cellpadding="0" cellspacing="10">
 <tr>
    <td><?php include("pre_design_header.php")?></td>
  </tr> 
 <tr>
    <td>
	
	<?php 
	if($_GET['detail']!=''){
		include("custom_field_details.php");
	}else{
		include("custom_field_listing.php");
	}
	?>
    
    
    </td>
  </tr>   
</table>

        