<?php 
// Initialize the session

session_start();
require_once 'db.php'; 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username'])){
  header("location: login.php");
  exit;
}
else{
	
require "db.php";

//new album start 
  if(isset($_POST['add_album']))
	  {
	$album_name=$_POST['album_name'];
	$day=$_POST['day'];
	$sql="select * FROM album WHERE name='$album_name'";
$status=mysqli_query($db, $sql);
$data=mysqli_num_rows($status);

if($data==1)
{
echo "<script>alert('Album Already Exists')</script>";
}
		  
else	
{	
		  
      $file_name = $_FILES['file']['name'];
	   $path="gallery/album/";
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
	  
	  move_uploaded_file($file_tmp,$path.$file_name);

  
	  $flag=1;
	   $finalpath="gallery/album/".$file_name;
	   $date=date("F j, Y");
	  $sql="insert into album (`name`,`image`,`date`,`day`,`flag`) VALUES('$album_name','$finalpath','$date','$day','$flag')";
	  $status=mysqli_query($db, $sql);
	  
	  
	  if($status)
	  {
		 
	  } $myNewFolderPath = "gallery/" . $album_name;
		mkdir($myNewFolderPath, 0777);
		
		echo "<script>alert('Album Added Successfully')</script>";
}	  
  }
//new album end 


//Disable album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['id']))
	{
		$oldflag=0;
		$id=$_GET['id'];
		
		  
      $data="UPDATE album SET flag='$oldflag' where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	  
	  if($status)
	  {
		echo "<script>alert('Album Disabled Successfully')</script>";
	  }
		
	}


//Disable album script end here

	//delete album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['idd']))
	{
		$oldflag=0;
		$id=$_GET['idd'];
		
		  
      $data="DELETE FROM album where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	  
	  if($status)
	  {
		echo "<script>alert('Album Deleted Successfully')</script>";
	  }
		
	}


//delete album script end here
	

//active album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['active']))
	{
		$oldflag=1;
		$id=$_GET['active'];
		
		  
      $data="UPDATE album SET flag='$oldflag' where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	  
	  if($status)
	  {
		echo "<script>alert('Album Actived Successfully')</script>";
	  }
		
	}


//active album script end here

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Upload A Images</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/vpb_uploader.js"></script>
	<script type="text/javascript">
$(document).ready(function()
{
	// Call the main function
	new vpb_multiple_file_uploader
	({
		vpb_form_id: "form_id", // Form ID
		autoSubmit: true,
		vpb_server_url: "albumupload.php" 
	});
});
</script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    
	
	<?php require "header.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Create New Album
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form name="form_id" id="form_id" action="javascript:void(0);" enctype="multipart/form-data">
						
                               
                                <label for="password">Album Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="album" required name="album_name" class="form-control" placeholder="Enter Album Name" onkeyup="showHint(this.value)">
                                    
									</div>
									<span id="txtHint" style="margin-top:10px;"></span>
								</div>
								
								 <label for="password">Date</label>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" required id="password" class="form-control" name="day">
                                    </div>
                                </div>
                               
                                <button type="submit" id="btnsubmit" class="btn btn-primary m-t-15 waves-effect" name="add_album">Submit</button>
                            </form>
							
                        </div>
                    </div>
                </div>
            </div>
         
           
        </div>
		
    </section>
	
	
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
	
	
	<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "ajax/album.php?q="+str, true);
        xmlhttp.send();
    }
}


</script>

</body>

</html>
<?php 
	}	
?>	