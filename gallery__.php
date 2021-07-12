

<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td align="left" valign="top"><?php include("pre_design_header.php")?></td>
  </tr>
   <tr>
	<td align="left" valign="top">
		<?php if($_GET['mcat']!='') include("gallery_content.php"); else include("gallery_album.php");?>	</td>
  </tr>
  <tr>
    <td width="0" height="0" align="left" valign="top">
		  <?php include("paging.php");?>	</td>
  </tr>
</table>

