<?
class defenders{
		
	function encryptDecryptURL($text, $key ='') {
		// return text unaltered if the key is blank
		if ($key == '') {
			return $text;
		}
	
		// remove the spaces in the key
		$key = str_replace(' ', '', $key);
		if (strlen($key) < 8) {
			exit('key error');
		}
		// set key length to be no more than 32 characters
		$key_len = strlen($key);
		if ($key_len > 32) {
			$key_len = 32;
		}
	
		$k = array(); // key array
		// fill key array with the bitwise AND of the ith key character and 0x1F
		for ($i = 0; $i < $key_len; ++$i) {
			$k[$i] = ord($key[$i])+-0x1A;
			
		}
	
		// perform encryption/decryption
		for ($i = 0, $j = 0; $i < strlen($text); ++$i) {
			$e = ord($text[$i]);
			// if the bitwise AND of this character and 0xE0 is non-zero
			// set this character to the bitwise XOR of itself and the jth key element
			// else leave this character alone
			if ($e & 0xE0) {
				$text[$i] = chr($e ^ $k[$j]);
			}
			// increment j, but ensure that it does not exceed key_len-1
			$j = ($j + 1) % $key_len;
		}
		return $text;
	}


	function escapeInjection($variable){
		
		global $conn;

		$variable = strip_tags(mysqli_real_escape_string($conn, trim($variable))); 
		
		$variable = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $variable);
		$variable = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $variable);
		$variable = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $variable);
		$variable = str_replace( array('<','>',"'",'"',')','('), array('&lt;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $variable );
    	$variable = str_ireplace( '%3Cscript', '', $variable );
		$variable = html_entity_decode($variable, ENT_COMPAT, 'UTF-8');
		 
		// Remove any attribute starting with "on" or xmlns
		$variable = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $variable);
		 
		// Remove javascript: and vbscript: protocols
		$variable = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $variable);
		$variable = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $variable);
		$variable = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $variable);
		 
		// Remove namespaced elements (we do not need them)
		$variable = preg_replace('#</*\w+:\w[^>]*+>#i', '', $variable);
		 
		do{		// Remove really unwanted tags
				$old_variable = $variable;
				$variable = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $variable);
		}
		while ($old_variable !== $variable);
		
		return $variable;  
	}
}

$defenders = new defenders;
$keyword = 'wahtungabcdefghij01234567890klmnopqrstuvwxyztravel';
?>
