<?

class fileManager{

		

	function get_files($directory = null, $conditions = null) {

		

		if(empty($directory) || empty($conditions)){

			return false;

		}else{

			

			if(@$open_dir = opendir($directory)) {

				

				$files = array();

				$count = 1;



				while (false !== ($read_dir = readdir($open_dir))) {

					

					$extension = null;

					$width_height = null;

					$caption = null;

					

					$size = $this->convemysqli_query($conn, ize($directory.$read_dir));



					@$resolution = getimagesize($directory.$read_dir);

					

					if($resolution['mime']){

						if(preg_match('/image/', $resolution['mime'])){

							$width_height = $resolution['0'].'x'.$resolution['1'].'px';

						}

					}

					//echo '<br><pre>';print_r($resolution);echo '</pre>';

					

					$info = pathinfo($directory.$read_dir);

					$date_stamp = filemtime($directory.$read_dir);

					$date = date("M d, Y", $date_stamp);

					if(!empty($info['extension'])){ 

						$extension = strtoupper($info['extension']);

					}

					

					$file_details = array('extension' => $extension, 'date' => $date_stamp);

					

					$file_caption_qry = mysqli_query($conn, "SELECT * FROM file_manager WHERE file='".$directory.$read_dir."'");

					$file_caption = mysqli_fetch_assoc($file_caption_qry);

					

					if(!empty($file_caption['caption'])) $caption = $file_caption['caption'];

					

					if($this->fileValidation($conditions, $file_details) == true){

								

						$files[$count] = array(

								'extension' => $extension, 

								'path' => $directory.$read_dir, 

								'info' => $pathinfo, 

								'size' => $size, 

								'width_height' => $width_height, 

								'date' => $date,

								'caption' => $caption

								

								//'type' => '', 

								//'xxx' => '1'

						);

						

						//echo '<pre>';print_r($files[$count]);echo '</pre>';

						$count++;

						

					/*}else{

						echo '<div>false validation</div>';	*/

					}

				}

				

				return $files;

				closedir($open_dir);							

			}else{

				return false;	

			}

		}

	}

	

	

	function fileValidation($conditions = null, $file_details = null){

		

		if(empty($conditions) && empty($file_details)){

			return false;

		}else{

			//echo '------------------------------<pre>';print_r($conditions);echo '</pre>';

			//echo '==============================<pre>';print_r($file_details);echo '</pre>';

			

			if(!empty($file_details['extension'])){

				if (!in_array($file_details['extension'], $conditions['extension_cond'])) {

					return false;

				}

			}else{

				return false;

			}

			/*

			if(!empty($conditions['date_range']['from']) && !empty($conditions['date_range']['to'])){

				

				if($file_details['date'] >= $conditions['date_range']['from']  && $file_details['date'] <= $conditions['date_range']['to']){

					return true;

				}else{

					return false;

				}

			}*/

			return true;

		}

		

		

		

	}

	

	function convertSize($size){

		if($size > 1000000){

			$size = number_format(($size/1000000), 2, '.', ',').'MB';

		}elmysqli_query($conn,  1000){

			$size = number_format(($size/1000), 2, '.', ',').'KB';

		}else{

			$size = $size.'B';	

		}

		return $size;

	}

	

	

	function getDirectoryOverview($path, $extension_cond = null) {

		

		$totalsize = 0;

		$totalcount = 0;

		$dircount = 0;

		

		if(@$handle = opendir($path)){

			while (false !== ($file = readdir($handle))){

				

				$info = pathinfo($path.$file);



				if(!empty($info['extension'])){ 

					$extension = strtoupper($info['extension']);

				}

				if(@in_array($extension, $extension_cond)){			

				

					  $nextpath = $path . '/' . $file;

					  if($file != '.' && $file != '..' && !is_link ($nextpath))

					  {

						if(is_dir($nextpath))

					   {

						 $dircount++;

						 $result = $this->getDirectoryOverview($nextpath);

						 $totalsize += $result['size'];

						  $totalcount += $result['count'];

						 $dircount += $result['dircount'];

					   }

					   else if(is_file ($nextpath))

					   {

						  $totalsize += filesize ($nextpath);

						  $totalcount++;

					   }

					 }

				}

			}

		}

		@closedir($handle);

		$total['size'] = $this->convertSize($totalsize);

		$total['count'] = $totalcount;

		$total['dircount'] = $dircount;

		return $total;

	}

	

	

	function uploadFile($file_source, $type){

		

		if(empty($file_source) || empty($type)){

			return false;

		}else{

			

			//echo $file_source = $_FILES['file']['tmp_name']; 

			//echo $type = $_FILES['file']['type']; 

			$ext = substr(strrchr($type, "/"), 1);

			

			switch ( $ext )

			{

				case 'pjpeg':

					$file = 'photo/'.uniqid('').'.jpg';

					break;

			

				case 'jpg':

					$file = 'photo/'.uniqid('').'.jpg';

					break;

		

				case 'jpeg': 

					$file = 'photo/'.uniqid('').'.jpg';

					break; 

				 

				case 'gif':

					$file = 'photo/'.uniqid('').'.gif';

					break;

				 

				case 'png':

					$file = 'photo/'.uniqid('').'.png';

					break;	

					

				case 'pdf':

					$file = 'attachment/'.uniqid('').'.pdf';

					break;

			

				case 'vnd.ms-excel': 

					$file = 'attachment/'.uniqid('').'.xls';

					break; 

		

				case 'vnd.openxmlformats-officedocument.spreadsheetml.sheet': 

					$file = 'attachment/'.uniqid('').'.xlsx';

					break;

					

				case 'msword': 

					$file = 'attachment/'.uniqid('').'.doc';

					break;

										

				case 'vnd.openxmlformats-officedocument.wordprocessingml.document': 

					$file = 'attachment/'.uniqid('').'.docx';

					break; 		

									

			}

			

			if (( $file != '' ) ){  

				$file="../".$file;

				if (move_uploaded_file($file_source, $file)){

					

					mysqli_query($conn, "INSERT INTO file_manager ( id, file, caption, created) 

									values ('', '".$file."', '".mysqli_real_escape_string($conn, $_POST['caption'])."','".date("Y-m-d")."')");

					

					return $save = '<div class="true_massage">Successfully upload '.$file.'.</div>';

				}else{

					return $save = '<div class="false_massage">Failed to upload '.$file.'.</div>';

				} 

			}

		}

	}

	

	function deleteFile($file_path){

		

		if(empty($file_path)){

			return false;	

		}

		

		if(@unlink($file_path)){

			return $save = '<div class="true_massage">Successfully delete '.$file_path.'.</div>';

		}else{

			return $save = '<div class="false_massage">Failed to delete '.$file_path.'.</div>';

		} 

	}

	

	

}



$fileManager = new fileManager;



?>

