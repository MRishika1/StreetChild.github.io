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
	
//delete album script start here	
	
	if(isset($_SESSION['username']) && isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$img="delete from album_image where id='$id'";
		$allimg=mysqli_query($db, $img) or die ('error in query');
		
		  
	  if($allimg)
	  {
		echo "<script>alert('Image Deleted Successfully')</script>";
	  }else{
		  
		  echo "<script>alert('Image not delete some thing went wrong')</script>";
	  }
		
	}
	//delete album script end here
	
	//Disable album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['dis']))
	{
		$oldflag=1;
		$id=$_GET['dis'];
		
		  
      $data="UPDATE album SET flag='$oldflag' where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	  
	  if($status)
	  {
		echo "<script>alert('Album Disabled Successfully')</script>";
	  }
		
	}


//Disable album script end here

//active album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['active']))
	{
		$oldflag=0;
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
                                All Active Album
                                
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
						
	$imgq = "SELECT * FROM album_image ORDER BY id DESC";
	$getimg=mysqli_query($db, $imgq) or die ('error to select album');
     while($row=mysqli_fetch_array($getimg))
 {
 
	 ?>
						
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images.php?album=<?php echo $row['id']; ?>" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['image_path']; ?>">
										<a href="all_image.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
									</a>
                                </div>
                               
                          
 <?php }	?>					
						  </div>	
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Disable Album
                                
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
$query="SELECT * FROM album where flag=1";
						$data=mysqli_query($db, $query) or die ('error to select album');
						

 while($row=mysqli_fetch_array($data))
 {
		$id = $row['id'];
	$myimg = null;
	$imgq = "SELECT * FROM album_image WHERE album_name='$id' ORDER BY id DESC";
	$getimg=mysqli_query($db, $imgq) or die ('error to select album');
	
	while($dd=mysqli_fetch_array($getimg)){
		$myimg = $dd['image_path'];
	}

 
	 ?>
						
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="images.php?album=<?php echo $row['id']; ?>" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="<?php echo $myimg; ?>" alt="<?php echo $myimg; ?>">
										<p style="text-align:center; font-size:18px; font-weight:16px;"> <?php echo $row['name']; ?> </p>
										<a href="all_image.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
										<a href="all_image.php?active=<?php echo $id; ?>"><span class="glyphicon glyphicon-ok" style="color:Green;"></span></a>
									</a>
                                </div>
                               
                          
 <?php }	?>					
						  </div>	
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