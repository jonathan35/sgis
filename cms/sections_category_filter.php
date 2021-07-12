<script language="JavaScript">

function jumpMenu(target,selObj,restore){ 
  if (selObj.selectedIndex>0 && selObj.options[selObj.selectedIndex].value != ''){
    window.open(selObj.options[selObj.selectedIndex].value,target);}
  else if(selObj.options[selObj.selectedIndex].value == '')  {selObj.selectedIndex=0;}
  if (restore) selObj.selectedIndex=0;
}
</script>

<?
	
	
	
	if(strstr($_SERVER["REQUEST_URI"], 'news.php')){
		
				
	}else{
		

	}
	
	
	$main_category_filter = true;
	$sectionType_cond  = "and url_file = '' ";//"and section_type != 2 ";
	$current_sec_lvlpost_cond = '';
	
	/*if(!empty($_GET['m'])){
		$current_section_id =  base64_decode($_GET['m']);
		$_GET['main'] = $_GET['m'];
	}*/
	
	if($_GET['main']!=''){
		$current_section_id = $defenders->escapeInjection(base64_decode($_GET['main']));
	}
	
	if(!empty($current_section_id)){
		$current_section_qry = mysqli_query($conn, "select * from sections_categories where maincat_id='".$current_section_id."%' ");
		$current_section=mysqli_fetch_assoc($current_section_qry); 
		
		if(!empty($current_section['section_type'])){
			if($current_section['section_type'] == '2'){
				$main_category_filter = false;
				$sectionType_cond  = "and url_file != ''";
				$current_sec_lvlpost_cond = "and position like '".$current_section['position']."%'";
			}
		}	
	}
?>
<?php 
if($main_category_filter == true){
	$qry = mysqli_query($conn, "select * from sections_categories where status = 1 and length(position) = 1 $sectionType_cond order by maincat_name asc");
	$main = mysqli_fetch_assoc($qry); 
?>
	<span class="content" style="padding-right:5px;">
		Filter:
		<select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
			<option value="">Select section...</option>
			<option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&all=1" <?php if($_GET['all']==1){?> selected<?php }?>> All section</option>
			<option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&nocat=1" <?php if($_GET['nocat']==1){?> selected<?php }?>> No section</option>
		  <?php do{ $maincat_Rs1=base64_encode($main['maincat_id']);?>
		  <option value="<?php printf($currentPage); ?>?main=<?php echo $maincat_Rs1;?>&tab=<?php echo $_GET['tab'];?>" <?php if($_GET['main']==$maincat_Rs1){?>selected<?php }?>><?php echo $main['maincat_name']; ?></option>
		  <?php }while($main=mysqli_fetch_assoc($qry)); ?>
		</select>
	</span>
		
		&nbsp;&nbsp;&nbsp;&nbsp;
<?php }?>		
<?php 

		$qry02=mysqli_query($conn, "select * from sections_categories where status=1 and length(position)=2 $sectionType_cond $current_sec_lvlpost_cond order by maincat_name asc");
		$main02=mysqli_fetch_assoc($qry02); 
?>

    <span class="content" style="padding-right:5px;">
        <select name="filter" style="width:150px;" onChange="javascript:jumpMenu('_self',this,0)">
            <option value="">Select category...</option>
            <!--<option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&all=1&main=<?=$_GET['main']?>" <?php if($_GET['all']==1){?> selected<?php }?>> All category</option>-->
            <option value="<?php printf($currentPage); ?>?tab=<?php echo $_GET['tab'];?>&nocat=1&main=<?=$_GET['main']?>" <?php if($_GET['nocat']==1){?> selected<?php }?>> No category</option>
          <?php do{ $maincat_Rs102=base64_encode($main02['maincat_id']);?>
          <option value="<?php printf($currentPage); ?>?sub=<?php echo $maincat_Rs102;?>&tab=<?php echo $_GET['tab'];?>&main=<?=$_GET['main']?>" <?php if($_GET['sub']==$maincat_Rs102){?>
          selected<?php }?>><?php echo $main02['maincat_name']; ?></option>
          <?php }while($main02=mysqli_fetch_assoc($qry02)); ?>
        </select>
    </span>                                  
