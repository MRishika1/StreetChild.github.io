<?php 
// Initialize the session
session_start();
require_once 'db.php'; 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username'])){
  header("location: login.php");
  exit;
}

	

//new album end 


//delete album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$sql="delete from popup where id='$id'";
		$status=mysqli_query($db, $sql) or die ('error in query');
		
		  
	  if($status)
	  {
		echo "<script>alert('Popup Deleted Successfully')</script>";
	  }
		
	}


//delete album script end here

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
			 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              All Popup
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
                       
						
						<?php
						
						//display all album lists 
						
						
						$query="SELECT * FROM rchild ";
						$data=mysqli_query($db, $query) or die ('error to select album');
						
						?>
						
						  <table class="table">
								<thead>
								  <tr>
									<th>popup Image</th>
									<th>popup Name</th>
									<th>Date</th>
									<th> </th>
								  </tr>
								</thead>
								<tbody>
							<?php 
                              
							  while($row=mysqli_fetch_array($data))
                              {
							?>		
							
							
								  <tr>
									<td><img src="<?php echo $row['image']; ?>" height=100 width=100></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td>
									<a href="popup.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
									
									</a>
									</td>
									
								  </tr>
							<?php 
							  }
							?>							
								</tbody>
						</table>
						
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Create New Popup
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
                            <form action="#" method="post" enctype="multipart/form-data">
						
                               
                                <label for="password">Popup Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="password" required name="popup_name" class="form-control" placeholder="Enter Popup Name" onkeyup="showHint(this.value)">
                                    
									</div>
									<span id="txtHint" style="margin-top:10px;"></span>
								</div>
								
								 <label for="password">Popup Image</label>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required id="password" class="form-control" name="file">
                                    </div>
                                </div>
								
								 <label for="password">Date</label>
                               
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="password" class="form-control" name="day">
                                    </div>
                                </div>
                               
                                
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="add_popup">Submit</button>
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
