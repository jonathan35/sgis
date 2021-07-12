<script src="../js/bublePopup/bubleBox_jquery.js" type="text/javascript"></script> 
<script src="../js/bublePopup/bubleBox_function.js" type="text/javascript"></script> 
<link href="../css/bublePopup/bublePupup.css" rel="stylesheet" type="text/css">


<?php 

class GENERAL_BOX_DESIGN{
	
	function box1($box1){
		$box01="<div class=\"";
		return $box01;
	}
	
	function box2($box2){
		$box02="\" >
                <div style=\"float:left;\">
                    <img class=\"trigger\" src=\"../css/bublePopup/Information.png\" style=\"vertical-align:middle;\" id=\"download\" > 
                </div>
            <table id=\"dpop\" class=\"popup\" cellpadding=\"0\" cellspacing=\"0\"> 
        	<tbody>
            <tr> 
        		<td id=\"topleft\" class=\"corner\"></td> 
        		<td class=\"top\"></td> 
        		<td id=\"topright\" class=\"corner\"></td> 
        	</tr> 
        	<tr> 
        		<td class=\"left\"></td> 
        		<td>
                <table class=\"popup-contents\"> 
        			<tbody>
                    <tr> 
        				<td width=\"180px\">";
	 return $box02;
	}
	
	
	function box3($box3){
		$box03="</td> 
        			</tr> 
        			</tbody>
                </table> 
        		</td> 
        		<td class=\"right\">
                </td>    
        	</tr> 
        	<tr> 
        		<td class=\"corner\" id=\"bottomleft\"></td> 
        		<td class=\"bottom\" id=\"bottom\"><!--<img width=\"30\" height=\"29\" alt=\"popup tail\" src=\"../css/bublePopup/bubble-tail2.png\"/> --></td> 
        		<td id=\"bottomright\" class=\"corner\"></td> 
        	</tr> 
        </tbody>
        </table>";
		return $box03;
	}
	
	function box4($box4){
		$box04="</div>";
		return $box04;
	}	
}

$general_box_design = new GENERAL_BOX_DESIGN;
	
	
	
	function image01($field){
		$field_name = "Image";
		$field_message = "recommended image size<br>220 x 220 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}
	
	function image02($field){
		$field_name = "Image";
		$field_message = "recommended image size<br>500 x 375 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}	
	
	function image03($field){
		$field_name = "Image";
		$field_message = "recommended image size<br>100 x 120 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}
	
	function image04($field){
		$field_name = "Image";
		$field_message = "recommended image size<br>290 x 410 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}
	function image06($field){
		$field_name = "Image";
		$field_message = "recommended image size<br>230 x 190 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}			
		function image05($field){
		$field_name = "Image";
		$field_message = "Photo 1 recommended image size<br>160 x 190 pixels<br />Photo 2 recommended image size<br>160 x 370 pixels";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
	}			
	
	function attachment($field){
		$field_name = "Attachment File";
		$field_message = "Max. size: 10MB.<br />File format: PDF, doc, xls";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}
		
		
	function hyperlink($field){
		$field_name = "Hyperlink";
		$field_message = "Example: <br>http://www.abcde.com";
		$field_class = "bubbleInfo2";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}
		
	function date_field($field){
		$field_name = "Date";
		$field_message = "Date Format: <br>YYYY-MM-DD";
		$field_class = "bubbleInfo3";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}		
		
	function date_field02($field){
		$field_name = "Completion Date";
		$field_message = "Date Format: <br>YYYY-MM-DD";
		$field_class = "bubbleInfo3";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}				

	function date_field03($field){
		$field_name = "Closing date";
		$field_message = "Date Format: <br>YYYY-MM-DD";
		$field_class = "bubbleInfo3";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}				

	function brief($field){
		$field_name = "Brief";
		$field_message = "Max. 300 characters only";
		$field_class = "bubbleInfo3";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo $style_box1.$field_class.$style_box2.$field_message.$style_box3.$field_name.$style_box4;
		}			
	function tiny01($field){
		$field_name = "Description";
		$field_class = "bubbleInfo";
		
		global $general_box_design;
		$style_box1 =  $general_box_design->box1($box1);
		$style_box2 =  $general_box_design->box2($box2);
		$style_box3 =  $general_box_design->box3($box3);
		$style_box4 =  $general_box_design->box4($box4);
		
		echo "
		<div class=\"".$field_class."\">
			<a href=\"../CMS_help.pdf\" target=\"_blank\">
			<img class=\"trigger\" src=\"../css/bublePopup/help.png\" style=\"vertical-align:middle;\" border=\"0\" >
			</a>".$field_name."
		</div>";
		}			
		
	
	
	
	
	
	
	
?>          
          
