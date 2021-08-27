<?php require_once('Connections/pamconnection.php'); 

$detail=base64_decode($_GET['detail']);
if($detail!="")
{
$selected_query=mysqli_query($conn, "select * from product_section where status=1 and id='".$detail."' order by name asc, id desc");
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
<link href="css.css" rel="stylesheet" type="text/css">
<table width="96%" border="0" cellspacing="10" cellpadding="0">
 <tr>
    <td align="left"><div align="left"><span class="heading4"><br />
    Decorative Concrete Solutions</span><br />
    </div></td>
 </tr> 
    
  

                        <tr valign="top">
                          <td align="center" valign="top">
                          <?php if($selected['image1']!='' && file_exists($selected['image1'])){?>
                          <?php }?>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left" valign
                              ="top"><div align="left">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><div align="center" class="content_price02"><strong><?php echo $selected['name'];?></strong></div></td>
                                  </tr>
                                </table>
                                <span class="content_text"><span style="width:100%"><?php echo str_replace("../../photo/","photo/",$selected['description']); ?></span></span>
                                <p align="right"><span class="content_text" style="width:100%"><span class="title3"><br />
                                  <br />
                                  <br />
                                  <br />
                                  Updated on <?php echo $selected['date'];?></span><br>
                                </span>                                  </p>
                              </div></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">
                              <table width="24%" border="0" cellpadding="0" cellspacing="0" align="right">
                  <tr>
                  	
                  	<?php if($selected['pdf_file']!=''){?>
                    <td align="center"><span class="content_text3"><strong>
                    <a href="<?php echo $selected['pdf_file']?>" target="_blank">PDF</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
                    <?php }?>
                    <?php if($selected['weblink']!='' && $selected['weblink']!='http://www.'){?>
                    <td align="center"><span class="content_text3"><strong>
                    <a href="<?php echo $selected['weblink']?>" target="_blank" class="content">Link</a>
                    </strong></span>&nbsp;<span class="content_text">&#9658;</span>&nbsp;&nbsp;</td>
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
            	<div style="border:solid 1px #CCC; padding:0px;">
				<?php echo $commet_set['contributer_name']." Said:";?><br><img src="cms/images/space.gif" height="5" width="20"><br>
                <span class="content_text5"><?php echo $commet_set['date'];?></span><br><img src="cms/images/space.gif" height="5" width="20"><br>
                <span class="content_text8"><?php echo $commet_set['comment'];?></span></div><br>
				<?php }while($commet_set = mysqli_fetch_assoc($commet_query));?>            </td>
          </tr>             
<?php }
if($selected['comment_featured']=='1'){
?>
          <tr>
            <td>&nbsp;</td>
          </tr>
<?php }?>
                          </table>                          </td>
                        </tr>
                      <tr>
                        <td align="center"><?php include("feature_tools.php")?>
                            <br />
                            <?php 
							
if($_GET['sub']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['sub']));
}elseif($_GET['main']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['main']));
}elseif($_GET['root']!=''){
	$section_id = mysqli_real_escape_string($conn, base64_decode($_GET['root']));
}			

	$prev_query = mysqli_query($conn, "select * from product_section where status=1 and name<='".$selected['name']."' and id!='".$selected['id']."' and category like '%|".$section_id."|%' order by name desc, id asc limit 1");
	$prev_set = mysqli_fetch_assoc($prev_query);
	$next_query = mysqli_query($conn, "select * from product_section where status=1 and name>='".$selected['name']."' and id!='".$selected['id']."' and category like '%|".$section_id."|%' order by name asc, id desc limit 1");
	$next_set = mysqli_fetch_assoc($next_query);
	
	

?>  
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 0px 0px 0px; border:1px #CCC solid; background-color:#fff;">
                          <tr>
                            <td align="left" class="content_text" width="50%">
                            <?php if($prev_set['id']!=''){?>
                            <a href="result.php?root=<?php echo $_GET['root'];?>&main=<?php echo $_GET['main'];?>&sub=<?php echo $_GET['sub'];?>&detail=<?php echo base64_encode($prev_set['id']);?>">
                            <img src="images/arrow02.gif" style="vertical-align:middle;" border="0" />
							<?php 
							$content01 = $prev_set['name']." ";
					echo substr( $content01, 0,strrpos( substr( $content01, 0, 30), ' ' ));
					if(strlen($content01)>30)echo "..";
							?>
                            </a>
                            <?php }?>                            </td>
                            <td align="right" class="content_text" width="50%">
                            <?php if($next_set['id']!=''){?>
                            <a href="result.php?root=<?php echo $_GET['root'];?>&main=<?php echo $_GET['main'];?>&sub=<?php echo $_GET['sub'];?>&detail=<?php echo base64_encode($next_set['id']);?>">
							<?php 
							$content02 = $next_set['name']." ";
					echo substr( $content02, 0,strrpos( substr( $content02, 0, 30), ' ' ));
					if(strlen($content02)>30)echo "..";
							?><img src="images/arrow01.gif" style="vertical-align:middle;" border="0" />                            </a>
                            <?php }?>                            </td>
                          </tr>
                        </table>                        </td>
  </tr>
                      </table>
