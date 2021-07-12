	<?

    if($_GET['m']!=''){
		
		$_SESSION['current_section'] = base64_decode($_GET['m']);
	}
	
		if($_SESSION['current_section']!='') {
			
			$filter_section_limit_query = " and maincat_id=".$_SESSION['current_section'];
			
			
			$current_template_query=mysqli_query($conn, "select * from murum_section where maincat_id='".$_SESSION['current_section']."' and status=1 ");
			$current_template_set=mysqli_fetch_assoc($current_template_query);
			
			
			$same_template_query=mysqli_query($conn, "select * from murum_section where url_file='".$current_template_set['url_file']."' ");
			$same_template_set=mysqli_fetch_assoc($same_template_query);	
			
			$filter_count = 1;
			$section_limit_query.= "and (";
			do{
				if($filter_count!=1){
						$section_limit_query.= " or ";
				}
				$section_limit_query.= "maincat_id=".$same_template_set['maincat_id'];
			$filter_count++;
			}while($same_template_set=mysqli_fetch_assoc($same_template_query));
			$section_limit_query.= ")";
			
			
		}	
	
	?>
