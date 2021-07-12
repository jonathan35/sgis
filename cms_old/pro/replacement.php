<?php 
class replacements{
	
		function truncate($content,$length,$replace=' ...'){
			
			if(strlen($content) > $length){
				
				return substr_replace($content, $replace, strrpos(substr($content, 0, $length), 32));
			
			}else{
				
				return $content;
			}
		}
}

$replacements = new replacements;
?> 
