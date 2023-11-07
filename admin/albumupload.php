<?php
// Initialize the session

session_start();
 
if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
{
require_once 'db.php';

	$album_id = '1';

	$vpb_file_name = str_replace(' ', '', $_FILES['upload_file']['name']);
	$vpb_file_name= uniqid().$_FILES['upload_file']['name'];
	
	$vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
	$vpb_file_size = $_FILES['upload_file']['size']; // File Size
	$vpb_uploaded_files_location = 'gallery/'; //This is the directory where uploaded files are saved on your server
	$vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
	//Without Validation and does not save filenames in the database
	
	$finalpath = $vpb_final_location;
	
	if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location))
	{
		$date=date("F j, Y");
	  $sql="insert into album_image (`album_name`,`image_path`,`date`) VALUES('$album_id','$finalpath','$date')";
	  $status=mysqli_query($db, $sql);
		echo $vpb_file_name;
		print_r($_POST);
	}
	else
	{
		//Display general system error
		echo 'general_system_error';
	}

}	  
	 
//new album end 
?>