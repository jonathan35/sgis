<link href="css.css" rel="stylesheet" type="text/css"><?php require_once('Connections/pamconnection.php'); 

$detail=base64_decode($_GET['detail']);
if($detail!="")
{
$selected_query=mysqli_query($conn, "select * from events_02 where status=1 and id='".$detail."'");
$selected=mysqli_fetch_assoc($selected_query);
}
?>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
  

                        <tr valign="top">
                          <td align="right" valign="top">
                          <?php if($selected['image1']!='' && file_exists($selected['image1'])){?>
                          <div align="center">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/line_h02.gif">
                              <tr>
                                <td><img src="images/line_h02.gif" /></td>
                              </tr>
                            </table>
                            <br />
                            <img src="<?php echo $selected['image1'];?>" width="500" height="375" border="0" /></a><br />
                            <br />
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/line_h02.gif">
                              <tr>
                                <td><img src="images/line_h02.gif" /></td>
                              </tr>
                            </table>
                            
                          </div>
                          <?php }?>  
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left" valign="top"><div align="left"><span class="content_price02"><strong><img src="images/space.gif" width="20" height="10" /><br />
                              <?php echo $selected['name'];?></strong><br />
                              </span>
                        <span class="title3"><?php echo $selected['date'];?></span><br>
                                  <span class="content_text"><?php echo str_replace("../../photo/","photo/",$selected['description']); ?><br>
                                <br></span>
                              </div></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">
                              <table width="24%" border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	
                  	<?php if($selected['pdf_file']!=''){?>
                    <td align="right"><div align="right"><span class="content_text3"><strong>
                    <a href="<?php echo $selected['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</div></td>
                    <?php }?>
                    <?php if($selected['weblink']!='' && $selected['weblink']!='http://www.'){?>
                    <td align="right"><div align="right"><span class="content_text3"><strong>
                    <a href="<?php echo $selected['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</div></td>
                    <?php }?>
                    </tr>
                  </table>                </td>
             </tr>
<?
$commet_query = mysqli_query($conn, "SELECT * FROM news_feedback where status=1 and news_id='".$selected['id']."' ORDER BY id DESC");
$commet_set = mysqli_fetch_assoc($commet_query);
if($commet_set!=''){
?>

          <tr>
            <td class="content_text3">
				<?php do{?>
            	<div class="content_price04" style="border:solid 1px #CCC; padding:0px;">
				<?php echo $commet_set['contributer_name']." Said:";?><br><img src="cms/images/space.gif" height="5" width="20"><br>
                <a href="http://design/instarmac02/result.php?root=MjIy&amp;id=&amp;main=MjI1&amp;sub=&amp;detail=NzQ="><span class="content_text5"><?php echo $commet_set['date'];?></span></a><br>
                <img src="cms/images/space.gif" height="5" width="20"><br>
                <span class="content_text8"><?php echo $commet_set['comment'];?></span></div><br>
				<?php }while($commet_set = mysqli_fetch_assoc($commet_query));?>            </td>
          </tr>             
<?php }
if($selected['comment_featured']=='1'){
?>
          <tr>
            <td>
            	<iframe name="comment" src="news_comment.php?news=<?php echo base64_encode($selected['id']);?>" width="100%" height="380" frameborder="0" scrolling="no"></iframe>            </td>
          </tr>
<?php }?>
                          </table>
                          <div align="right"></div></td>
                        </tr>
                      </table>
