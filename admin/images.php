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
	
	$idd = $_GET['album'];
	
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>All Images</title>
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
		vpb_server_url: "img_upload.php" 
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
            <!-- Image Gallery -->
         
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Images
                                
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
						 <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                           
				<?php
				
				
	if(isset($_SESSION['username']) && isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$sql="delete from album_image where id='$id'";
		$status=mysqli_query($db, $sql) or die ('error in query');
		
		  
	  if($status)
	  {
		echo "<script>alert('Image Deleted Successfully')</script>";
	  }
		
	}
				
				
   $name=$_GET['album'];
$query="SELECT * FROM album_image WHERE album_name='$name'";
						$data=mysqli_query($db, $query) or die ('error to select album');
						

 while($row=mysqli_fetch_array($data))

 {
	 ?>  
						
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?php echo $row['image_path']; ?>" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="<?php echo $row['image_path']; ?>" style="height:300px;">
										<p style="text-align:left; font-size:18px; font-weight:16px;"> 
										 <a href="images.php?id=<?php echo $row['id']; ?>&&album=<?php echo $name; ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
								 
										
										</p>
                                    </a>
                                </div>
                               
                          
 <?php }	?>					
						  </div>	
                        </div>
						
						<div class="body">
						
                            <form name="form_id" id="form_id" action="javascript:void(0);" enctype="multipart/form-data">
							
								<input type="text" name="album_id" value="<?php echo $idd; ?>" hidden/>
								
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
</body>

</html>
<?php 
	}	
?>		