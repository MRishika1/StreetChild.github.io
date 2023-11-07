  <?php
  if (isset($_GET['name'])) {
     $filename = $_GET["name"]; //Obviously needs validation
  ob_end_clean();
  header("Content-Type: application/octet-stream; "); 
  header("Content-Transfer-Encoding: binary"); 
  header("Content-Length: ". filesize($filename).";"); 
  header("Content-disposition: attachment; filename=" . $filename);
  readfile($filename);
  die();
  }

if (isset($_GET['file'])) {
	 $file = $_GET['file'];
if (!unlink($file))
  {
  echo ("upload error $file");
  }
else
  {
  echo ("Upload done $file");
  }
}

if (isset($POST)) {
	 $file_name = $_FILES['file']['name'];
	   $path=$_POST['path'];
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
	  
	  move_uploaded_file($file_tmp,$path.$file_name);

}
 
  ?>