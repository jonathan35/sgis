<!-- TinyMCE -->
<script type="text/javascript" src="../../tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste "//moxiemanager
    ],
    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | styleselect fontselect fontsizeselect",theme_advanced_fonts : "Arial=arial,helvetica,sans-serif; xxx; Courier New=courier new,courier,monospace;Times New Roman=times new roman,times,serif;Verdana=verdana,arial,helvetica,sans-serif;Tahoma=tahoma,arial,helvetica,sans-serif;",
	content_css : "css/content.css"
});
</script>
<!-- TinyMCE -->


<form action="product_enquiry1.php?read=yes&id=<?php echo $_GET['id'];?>" method="post" name="form1">
<table width="100%"  border="0" cellpadding="2" cellspacing="1">

  <tr>
    <td colspan="2" align="left"><div align="left" class="title6"><?php echo $send;?></div></td>
  </tr>
  
  <tr>
    <td colspan="2" align="left"><div style="font-size:16px; color:#FFF; background-color:#669; padding:3px 5px 3px 5px; width:100%; font-weight:bold;">Reply</div></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><textarea name="reply_message" class="mceEditor" style="width:590px; height:400px;"></textarea></td>
  </tr>  
  <tr class="style9">
    <td align="center" valign="top"><div>
      <input type="submit" name="Submit" value="Reply" onclick="return check();" />
      <input name="reset" type="reset" id="reset" value="Reset" />
    </div></td>
  </tr>
</table>
</form>
