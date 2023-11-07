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


//new album start 
  if(isset($_POST['add_album']))
	  {
	// $album_name=$_POST['album_name'];
	// $sql="select * FROM album WHERE name='$album_name'";
// $status=mysqli_query($db, $sql);
// $data=mysqli_num_rows($status);
	$data=0;
if($data==1)
{
echo "<script>alert('Album Already Exists')</script>";
}
		  
else	
{	
  if(isset($_POST['add_album']))
	  {

  $album_name=$_POST['album_name'];
	   $date=date("F j, Y");
	  $sql="insert into album (`name`,`date`) VALUES('$album_name','$date')";
	  $status=mysqli_query($db, $sql);
	  
	  
	  if($status)
	  {
		
		echo "<script>alert('Album Added Successfully')</script>";
	  }
	  }
  }
  
  
	  }
//new album end 
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Upload A Images</title>
    <!-- Favicon-->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

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

<style>
.vpb_files_remove_left_inner{
	color: red;
    cursor: pointer;
}
</style>
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
           <!-- Vertical Layout -->
            <div class="row clearfix">
			 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Images Upload
                            </h2>
                         
                        </div>
						
						
                        <div class="body">
						
                            <form name="form_id" id="form_id" action="javascript:void(0);" enctype="multipart/form-data">
								
								<div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="vasplus_multiple_files" id="vasplus_multiple_files" multiple="multiple">
                                    </div>
                                </div>

                                
                                <button type="submit" value="Upload" name="submit">Submit</button>
                            </form>
							<table class="table table-striped table-bordered" style="width:100%;" id="add_files">
	<thead>
		<tr>
			<th style="color:blue; text-align:center;">File Name</th>
			<th style="color:blue; text-align:center;">Status</th>
			<th style="color:blue; text-align:center;">File Size</th>
			<th style="color:blue; text-align:center;">Action</th>
		<tr>
	</thead>
	<tbody>
	
	</tbody>
</table>

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