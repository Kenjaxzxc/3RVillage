<?php 
	$arr_photo = array();
	$response = array();
		$j = 0;     // Variable for indexing uploaded image.
		     // Declaring Path for uploaded images.
		for($i=0; $i<count($_FILES['upimage']['name']); $i++){
			//$target_path = "uploads/";
			$target_path = "../../upload/messages/";
			$ext = explode('.', basename( $_FILES['upimage']['name'][$i]));
			$photo_name = md5(uniqid()) . "." . $ext[count($ext)-1]; 
			$target_path = $target_path . $photo_name;

			if(move_uploaded_file($_FILES['upimage']['tmp_name'][$i], $target_path)) {
				array_push($arr_photo, $photo_name);
				$response = array('status'=>true, 'photos'=>$arr_photo);
			    //echo "The file has been uploaded successfully <br />";
			} else{
				$response = array('status'=>false);
			    //echo "There was an error uploading the file, please try again! <br />";
			}
		}
	
	header('Content-type: Application/json');
	echo json_encode( $response );
	
?>