<?php require_once('../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}
	
	include("pro/file.php");
	
	if(!empty($_POST['submit'])){
		$message = $fileManager->uploadFile($HTTP_POST_FILES['file']['tmp_name'], $HTTP_POST_FILES['file']['type']);
	}


if(!empty($_GET['type'])){
	
	

	if($_GET['type'] == 'attachment'){ 
		$directory = '../attachment/'; 
		$extension_cond = array("PDF");
		$classType = 'filePDF';
		$title = 'Attachment';
	}elseif($_GET['type'] == 'photo'){ 
		$directory = '../photo/';
		$extension_cond = array("GIF", "JPEG", "JPG", "PNG");
		$classType = 'filePHOTO';
		$title = 'Photo';
	}elseif($_GET['type'] == 'pdf'){ 
		$directory = '../pdf/';
		$extension_cond = array("PDF");
		$classType = 'filePDF';
		$title = 'PDF';
	}elseif($_GET['type'] == 'image'){ 
		$directory = '../images/';
		$extension_cond = array("GIF", "JPEG", "JPG", "PNG");
		$classType = 'filePHOTO';
		$title = 'Image';
	}		
	
	if(!empty($_GET['del'])){ 
		$message = $fileManager->deleteFile($file_path = $_GET['del']);
	}
	
			
	$conditions = array('extension_cond' => $extension_cond, 'date_range' => array('from' => strtotime(date("Y-m-d")), 'to' => strtotime(date("Y-m-d"))));
	$total = ''; 
	$files = ''; 
	
	$total = $fileManager->getDirectoryOverview($directory, $extension_cond);
	$files = $fileManager->get_files($directory, $conditions);
?>

<style>
body {
	font-family:Arial, Helvetica, sans-serif;
	
}

form {
	border:1px solid #CCCCFF;
	width:auto;
	padding:10px;
	border:1px solid #999999;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	
}

.file {
	font-size:12px;
	color:#666;
	border:1px solid #666666;
	display:inline-block;
	margin:2px;
	padding:5px;
	text-align:center;
	vertical-align:top;
	background-color:#FFFFEC;
	width:160px;
}

.filePHOTO {
	height:130px;
}

.filePDF {
	height:100px;
}


.frame {
	padding:10px;
	margin:auto;
	border:1px #CCCCCC solid;
	background-color:#FFF;
}

.framePHOTO {
	width:100px;
	height:50px;
	
}


.framePDF {
	width:40px;
	height:20px;
}


.thum {
	max-width:100px;
	max-height:50px;
	vertical-align:middle;
}

.path {
	color:#F09; 
	padding:8px 2% 8px 2%; 
	width:96%;
	font-size:10px;
}

.group2 {
	background-color:#CCFFCC !important;
}

.title {
	font:bold 110% Arial, Helvetica, sans-serif ;	
	color:#0099FF;
	margin-top:10px 0 8px 0;
}

.true_massage {
	color:#006600;
	padding:8px;
	width:auto;
	margin-bottom:20px;
	background-color:#DFFFBF;	
	border:1px solid #96E88C;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
}

.false_massage {
	color:#CC0000;
	padding:8px;
	width:auto;
	margin-bottom:20px;
	background-color:#FFEAE6;
	border:1px solid #FFC1C1;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
}

.delete {
	color:#FF0000;
	font-size:11px;
	font-weight:bold;
	height:0;
	width:0;
	float:right;
	position:relative;
	right:10px;
	cursor:pointer;
	
}


</style>


<script type="text/javascript">
    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
        }
    }
	
	function confirm_action(file_name){
		
		if(file_name){
			var r = confirm("Are you confirm to delete "+file_name+"?");
			
			if (r==true){
				//alert("true");
				//document.location.reload();
				window.location.replace("new_file.php?type=<?=$_GET['type']?>&del="+file_name);
			}else{
				alert("false");	
			}
			
			
		}else{
			alert("No file selected to delete.");	
		}
	}
	
</script>


<div>
    <div>
		<?php if(!empty($message)) echo $message;?>
    </div>    
    
    
	<?php if($_GET['type'] == 'attachment' || $_GET['type'] == 'photo'){ ?>
    
    
    <div>
        <div class="title">Add <?php if(!empty($title)) echo $title;?></div>
        <form name="form" action="new_file.php?type=<?=$_GET['type']?>" method="post" enctype="multipart/form-data">
            Caption: <input type="text" name="caption">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Add">
        </form>
    </div>

    <?php }?>
    
    
    <div>
        <div class="title"><?php if(!empty($title)) echo $title;?> Gallery  </div>
    
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <div style="color:#0099FF; font-size:12px;">
            <?php if(!empty($total['size'])){ echo 'Total size: '.$total['size'];}?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php if(!empty($total['count'])){ echo 'File count: '.$total['count'];}?>
        </div> 
        <?php 
        if($files){		
            foreach($files as $id => $file){
                $divID = 'div'.$id.'pdf';
                ?>
              
              <div class="file <?=$classType?>">
              	<div class="delete" onclick="return confirm_action('<?=$file['path']?>')">X</div>
                <div><?='No.'.$id.': &nbsp;&nbsp;'.$file['date'];?><?php //echo 'TYPE: '.$file['extension'];?></div>
				<?php if($_GET['type'] == 'photo' || $_GET['type'] == 'image'){ ?>
                    <div class="frame framePHOTO"><a href="<?=$file['path']?>" target="_blank"><img src="<?=$file['path']?>" class="thum" /></a></div>
                <?php }elseif($_GET['type'] == 'attachment' || $_GET['type'] == 'pdf'){?>
                    <div class="frame framePDF"><a href="<?=$file['path']?>" target="_blank"><img src="../images/pdf.gif" class="thum" /></a></div>
                <?php }?>
                <div style="color:#000; font-size:12px;"><?php echo $file['caption'];?></div>
                <div id="<?=$divID?>" onClick="selectText('<?=$divID?>')" class="path"><?php echo $file['path'];?></div>
              </div>                
        <?php }
        }else{?>          
          <tr>
            <td colspan="5">No content found..</td>
          </tr>        
        <?php }/**/?>
        </table>
    </div>
</div>
<?php }?>