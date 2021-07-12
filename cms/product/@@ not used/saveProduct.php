<?php require_once('../../Connections/pamconnection.php'); 

session_start();

	//upload photo 1

	if($_FILES['file1']!='')

	{

		$file_source = $_FILES['file1']['tmp_name'];

		$type = $_FILES['file1']['type']; 

		$file = ''; 

		$ext = substr(strrchr($type, "/"), 1);

	

		switch ( $ext )

		{ 

			case 'pjpeg':

				$file = 'photo/'.uniqid('').'.jpg';

				break;

		

			case 'jpg':

				$file = 'photo/'.uniqid(''mysqli_query($conn, 

				break;

	

			case 'jpeg': 

				$file = 'photo/'.uniqid('').'.jpg';

				break; 

			 

			case 'gif':

				$file = 'photo/'.uniqid('').'.gif';

				break;

			case 'png':

				$file4 = 'photo/'.uniqid('').'.png';

				break;

		}

		if (( $file != '' ) )

		{ 

			if ( move_uploaded_file( $file_source, $file ) ) 

			{if($_GET['prod']=='edit'){mysqli_query($conn, "update family_product set photo1='$file' where id=".$_GET['id']);}} 

			else 

			{		
mysqli_query($conn, 
				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}//upload photo 2

	if($_FILES['file2']!='')

	{

		$file2_source = $_FILES['file2']['tmp_name'];

		$type = $_FILES['file2']['type']; 

		$file2 = ''; 

		$ext = substr(strrchr($type, "/"), 1);

	

		switch ( $ext )

		{ 

			case 'pjpeg':

				$file2 = 'photo/'.uniqid('').'.jpg';

				break;

		

			case 'jpg':

				$file2 = 'photo/'.uniqid('').'.jpg';

				break;mysqli_query($conn, 

	

			case 'jpeg': 

				$file2 = 'photo/'.uniqid('').'.jpg';

				break; 

			 

			case 'gif':

				$file2 = 'photo/'.uniqid('').'.gif';

				break;

			case 'png':

				$file4 = 'photo/'.uniqid('').'.png';

				break;



		}

		if (( $file2 != '' ) )

		{ 

			if ( move_uploaded_file( $file2_source, $file2 ) ) 

			{if($_GET['prod']=='edit'){mysqli_query($conn, "update family_product set photo2='$file2' where id=".$_GET['id']);}} 

			else 

			{		mysqli_query($conn, 

				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}//upload photo 3

	if($_FILES['file3']!='')

	{

		$file3_source = $_FILES['file3']['tmp_name'];

		$type = $_FILES['file3']['type']; 

		$file3 = ''; 

		$ext = substr(strrchr($type, "/"), 1);

	

		switch ( $ext )

		{ 

			case 'pjpeg':

				$file3 = 'photo/'.uniqid('').'.jpg';

				mysqli_query($conn, 

		

			case 'jpg':

				$file3 = 'photo/'.uniqid('').'.jpg';
mysqli_query($conn, 
				break;

	

			case 'jpeg': 

				$file3 = 'photo/'.uniqid('').'.jpg';

				break; 

			 

			case 'gif':

				$file3 = 'photo/'.uniqid('').'.gif';

				break;

			case 'png':

				$file4 = 'photo/'.uniqid('').'.png';

				break;



		}

		if (( $file3 != '' ) )

		{ 

			if ( move_uploaded_file( $file3_source, $file3 ) ) 

			{if($_GET['prod']=='edit'){mysqli_query($conn, "update family_product set photo3='$file3' where id=".$_GET['id']);}} 

			else 

			{		

				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}//upload photo 4

	if($_FILES['file4']!='')

	{

		$file4_source = $_FILES['file4']['tmp_name'];

		$type = $_FILES['file4']['type']; 

		$file4 = ''; 

		$ext = substr(strrchr($type, "/"), 1);

	

		switch ( $ext )

		{ 

			case 'pjpeg':

				$file4 = 'photo/'.uniqid('').'.jpg';

				break;

		

			case 'jpg':

				$file4 = 'photo/'.uniqid('').'.jpg';

				break;

	

			case 'jpeg': 

				$file4 = 'photo/'.uniqid('').'.jpg';

				break; 

			 

			case 'gif':

				$file4 = 'photo/'.uniqid('').'.gif';

				break;

			case 'png':

				$file4 = 'photo/'.uniqid('').'.png';

				break;

		}

		if (( $file4 != '' ) )

		{ 

			if ( move_uploaded_file( $file4_source, $file4 ) ) 

			{if($_GET['prod']=='edit'){mysqli_query($conn, "update family_product set photo4='$file4' where id=".$_GET['id']);}} 

			else 

			{		

				echo 'File could not be uploaded to server.<BR>';

			} 

		}

	}

	

$maincat=$_POST['fcat'];

$subcat=$_POST['scat'];

$brand=$_POST['brand'];

$name=$_POST['pname'];

$model=$_POST['model'];

$price=$_POST['price'];

$hotprice=$_POST['hotprice'];

$price_us=$_POST['price_us'];

$hotprice_us=$_POST['hotprice_us'];

$code=$_POST['code'];

$feature=$_POST['featured'];

$latest_arrival=$_POST['latest'];

$promotion=$_POST['promotion'];

$bestbuy=$_POST['bestbuy'];





	//upload description content

	$description=$_POST['description'];

	$description = str_replace ("'","&#39;",$description);

	$description = str_replace ("<br>","", $description);		

	$description = str_replace ("\\","", $description);	

	$description = str_replace ("'","\'", $description);	



if($_GET['prod']=='edit')	

{if(mysqli_query($conn, "update family_product set name='$name', maincat='$maincat', subcat='$subcat', brand='$brand', model='$model', code='$code',

price='$price', hot_price='$hotprice', price_us='$price_us', hot_price_us='$hotprice_us', description='$description', featured='$featured', 

latest='$latest', promotion='$promotion', bestbuy='$bestbuy'  where id=".$_GET['id']))

	header("location:editProduct.php?id=".$_GET['id']."&stat=".$success='yes');

else

	header("location:editProduct.php?id=".$_GET['id']."&stat=".$success='no');

}else{

	if(mysqli_query($conn, "INSERT INTO family_product (id, name, photo1, photo2, photo3, photo4, maincat, subcat, brand, model, code,

	price, hot_price, price_us, hot_price_us, description, featured, latest, promotion, bestbuy) 

	VALUES ('', '$name', '$file', '$file2', '$file3', '$file4', '$maincat', '$subcat', '$brand', '$model', '$code',

	'$price', '$hotprice', '$price_us', '$hotprice_us', '$description', '$featured', '$latest', '$promotion', '$bestbuy')"))		

		header("location:postProduct.php?stat=".$success='yes');

	else

		header("location:postProduct.php?stat=".$success='no');

}

?>