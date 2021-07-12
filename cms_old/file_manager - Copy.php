<?php require_once('../Connections/pamconnection.php'); 
	session_start();
	if($_SESSION['validation']=='YES')
	{}	
	else{
	header("Location:../authentication/login.php");
	}

	include("pro/file.php");

?>
<style>
body {
	font-family:Arial, Helvetica, sans-serif;
	
}

form {
	border:1px solid #CCCCFF;
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
</script>

<script type="text/javascript" src="js/autoHeight.js"></script>

<script src="js/tab/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="js/tab/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />


<body>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">PHOTO</li>
    <li class="TabbedPanelsTab" tabindex="0">IMAGES</li>
    <li class="TabbedPanelsTab" tabindex="0">ATTACHMENT</li>
    <li class="TabbedPanelsTab" tabindex="0">PDF</li>
    <li class="TabbedPanelsTab group2" tabindex="0">UPLOAD FILE</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
        <!--<table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td>
            Date From: <input type="text" name="date_from">
            Date To: <input type="text" name="date_to"><br>         
            Size: <input type="text" name="date_to">            
            
            </td>
          </tr>
        </table> -->
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<?php 
		$directory = '../photo/';
		$extension_cond = array("GIF", "JPEG", "JPG", "PNG");
		$conditions = array('extension_cond' => $extension_cond, 'date_range' => '');
		
		$total = ''; 
		$files = ''; 
		
		//$total = $fileManager->getDirectoryOverview($directory, $extension_cond);
		//$files = $fileManager->get_files($directory, $conditions);
		?>
              <div style="color:#09F; font-size:12px;">
                <?php if(!empty($total['size'])){ echo 'Total size: '.$total['size'];}?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!empty($total['count'])){ echo 'File count: '.$total['count'];}?>
              </div> 
		<?php 
		if($files){
			foreach($files as $id => $file){
				$divID = 'div'.$id.'photo';
				?>
                
               
              <div class="file filePHOTO">
                <div><?='No.'.$id.': &nbsp;&nbsp;'.$file['date'];?><?php //echo 'TYPE: '.$file['extension'];?></div>
                <div class="frame framePHOTO"><a href="<?=$file['path']?>" target="_blank"><img src="<?=$file['path']?>" class="thum" /></a></div>
                <div id="<?=$divID?>" onClick="selectText('<?=$divID?>')" class="path"><?php echo $file['path'];?></div>
                <div style="font-size:11px;">
					<?php if(!empty($file['size'])){ echo $file['size'];}?>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if(!empty($file['width_height'])){ echo $file['width_height'];}?>
                </div>
              </div>
        <?php }
		}else{?>       
          <tr>
            <td colspan="5">No content found..</td>
          </tr>        
        <?php }?>
        </table>
    </div>
    
    <div class="TabbedPanelsContent">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<?php 
		$directory = '../images/';
		$extension_cond = array("GIF", "JPEG", "JPG", "PNG");
		$conditions = array('extension_cond' => $extension_cond, 'date_range' => '');
		$total = ''; 
		$files = ''; 
		
		//$total = $fileManager->getDirectoryOverview($directory, $extension_cond);
		//$files = $fileManager->get_files($directory, $conditions);
		?>
              <div style="color:#09F; font-size:12px;">
                <?php if(!empty($total['size'])){ echo 'Total size: '.$total['size'];}?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!empty($total['count'])){ echo 'File count: '.$total['count'];}?>
              </div> 
		<?php 
		if($files){
	
			foreach($files as $id => $file){
				$divID = 'div'.$id.'image';
				?>
              <div class="file filePHOTO">
                <div><?='No.'.$id.': &nbsp;&nbsp;'.$file['date'];?><?php //echo 'TYPE: '.$file['extension'];?></div>
                <div class="frame framePHOTO"><a href="<?=$file['path']?>" target="_blank"><img src="<?=$file['path']?>" class="thum" /></a></div>
                <div id="<?=$divID?>" onClick="selectText('<?=$divID?>')" class="path"><?php echo $file['path'];?></div>
              </div>                
        <?php }
		}else{?>       
          <tr>
            <td colspan="5">No content found..</td>
          </tr>        
        <?php }?>
        </table>
    </div>    
    
    
    <div class="TabbedPanelsContent">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<?php 
		$directory = '../attachment/';
		$extension_cond = array("GIF", "JPEG", "JPG", "PNG");
		$conditions = array('extension_cond' => $extension_cond, 'date_range' => '');
		$total = ''; 
		$files = ''; 
		
		//$total = $fileManager->getDirectoryOverview($directory, $extension_cond);
		//$files = $fileManager->get_files($directory, $conditions);
		?>
              <div style="color:#09F; font-size:12px;">
                <?php if(!empty($total['size'])){ echo 'Total size: '.$total['size'];}?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!empty($total['count'])){ echo 'File count: '.$total['count'];}?>
              </div> 
		<?php 
		if($files){	
			foreach($files as $id => $file){
				$divID = 'div'.$id.'attachment';
				?>
              <div class="file filePDF">
                <div><?='No.'.$id.': &nbsp;&nbsp;'.$file['date'];?><?php //echo 'TYPE: '.$file['extension'];?></div>
                <div class="frame framePDF"><a href="<?=$file['path']?>" target="_blank"><img src="../images/pdf.gif" class="thum" /></a></div>
                <div id="<?=$divID?>" onClick="selectText('<?=$divID?>')" class="path"><?php echo $file['path'];?></div>
              </div>                
        <?php }
		}else{?>          
          <tr>
            <td colspan="5">No content found..</td>
          </tr>        
        <?php }?>
        </table>
    </div>
    <div class="TabbedPanelsContent">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
		<?php 
		$directory = '../pdf/';
		$extension_cond = array("PDF");
		$conditions = array('extension_cond' => $extension_cond, 'date_range' => '');
		$total = ''; 
		$files = ''; 
		
		//$total = $fileManager->getDirectoryOverview($directory, $extension_cond);
		//$files = $fileManager->get_files($directory, $conditions);
		?>
              <div style="color:#09F; font-size:12px;">
                <?php if(!empty($total['size'])){ echo 'Total size: '.$total['size'];}?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!empty($total['count'])){ echo 'File count: '.$total['count'];}?>
              </div> 
		<?php 
		if($files){		
			foreach($files as $id => $file){
				$divID = 'div'.$id.'pdf';
				?>
              <div class="file filePDF">
                <div><?='No.'.$id.': &nbsp;&nbsp;'.$file['date'];?><?php //echo 'TYPE: '.$file['extension'];?></div>
                <div class="frame framePDF"><a href="<?=$file['path']?>" target="_blank"><img src="../images/pdf.gif" class="thum" /></a></div>
                <div id="<?=$divID?>" onClick="selectText('<?=$divID?>')" class="path"><?php echo $file['path'];?></div>
              </div>                
        <?php }
		}else{?>          
          <tr>
            <td colspan="5">No content found..</td>
          </tr>        
        <?php }?>
        </table>
    </div>    
    <div class="TabbedPanelsContent">
    	<div style="display:inline-block; width:600px;">
        <iframe name="new photo" src="new_file.php?type=file" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="400"></iframe>
        </div>
    	<div style="display:inline-block; width:30px;"></div>
    	<div style="display:inline-block; width:600px;">
        <iframe name="new photo" src="new_file.php?type=photo" frameborder="0" style="background-color:#F2F2F2;" width="100%" height="400"></iframe>
        </div>
    </div>    

  </div>
</div>
</body>

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>