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
  if(isset($_POST['submit']))
	  {
	$title=$_POST['title'];
	$sql="select * FROM circular WHERE title='$title'";
$status=mysqli_query($db, $sql);
$data=mysqli_num_rows($status);

if($data==1)
{
echo "<script>alert('Cause Already Exists');
window.location = 'circular.php';</script>";
}
		  
else	
{	



  $file_name = $_FILES['file']['name'];
	   $path="circularpdf/";
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
	  
	  move_uploaded_file($file_tmp,$path.$file_name);

if($_FILES['file']) 
{	
	   $finalpath=$file_name;
}


	   $title=$_POST['title'];	  
	   $datee=$_POST['date'];	  
	   $des=$_POST['des'];	  
	   $flag=1;	  
	   $day=date("d/m");
	   $date=date("Y");
	  $sql="insert into circular (`title`,`dis`,`date`,`day`,`year`,`pdf`,`flag`) VALUES('$title','$des','$datee','$day','$date','$finalpath','$flag')";
	  $status=mysqli_query($db, $sql);
	  
	  
	  if($status)
	  {
		
		echo "<script>alert('Cause Added Successfully');
        window.location = 'circular.php';</script>";
	  }
}	  
  }
//new album end 


//delete album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['id']))
	{
		$id=$_GET['id'];
		
		$data="UPDATE circular SET flag='$oldflag' where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	 
		  
	  if($status)
	  {
		echo "<script>alert('Circular Disbled Successfully');
        window.location = 'circular.php';</script>";
	  }
		
	}


//delete album script end here




//circular album script start here

    
	if(isset($_SESSION['username']) && isset($_GET['active']))
	{
		$id=$_GET['id'];
		
		$oldflag=1;
		$id=$_GET['active'];
		
		  
      $data="UPDATE circular SET flag='$oldflag' where id='$id'";
	  $status=mysqli_query($db, $data)or die ('error in query');
	  	
		  
	  if($status)
	  {
		echo "<script>alert('Circular activated Successfully');
        window.location = 'circular.php';</script>";
	  }
		
	}


//circular album script end here



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
                              All Cause
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
						
						
						$query="SELECT * FROM circular ORDER BY id DESC";
						$data=mysqli_query($db, $query) or die ('error to select album');
						
						?>
						
						  <table class="table">
								<thead>
								  <tr>
									<th>Cause Id</th>
									<th>Cause Title</th>
									<th>Date</th>
									<th>Status</th>
									<th> </th>
								  </tr>
								</thead>
								<tbody>
							<?php 
                              
							  while($row=mysqli_fetch_array($data))
                              {
								  if($row['flag']==1)
									{
							
							?>		
								  <tr>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['title']; ?></td>
									
									<td><?php echo $row['date']; ?></td>
									<td>Active</td>
									<td>
									<a href="circular.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
									<a href="update_circular.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" style="color:red;"></span></a>
									</a>
									</td>
									
								  </tr>
							<?php 
							  }
							  else{
							  ?>
							  
							  
							  
							  
							  
							   <tr>
									<td style="opacity:0.5;"><?php echo $row['id']; ?></td>
									<td style="opacity:0.5;"><?php echo $row['title']; ?></td>
									
									<td style="opacity:0.5;"><?php echo $row['date']; ?></td>
									<td style="opacity:0.5;">Disbled</td>
									<td>
										<a href="circular.php?active=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-ok" style="color:green;"></span></a>
									
									</td>
									
								  </tr>
							  
							  
							  <?php
							  }
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
                                Create New Circular
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
						
                               
                                <label for="password">Cause Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="password" required name="title" class="form-control" placeholder="Enter Cause Name">
                                    
									</div>
									<span id="txtHint" style="margin-top:10px;"></span>
								</div>
								
								
								<label for="password">Upload Image</label>
                               
								<div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="password"  class="form-control" name="file" multiple="multiple" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                </div>

								 <label for="password">Description</label>
                               
								<div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="password"   class="form-control" name="des" multiple="multiple" style="height:100px;">
                                    </div>
                                </div>
								 
								<label for="password">Date</label>
                               
								<div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="password" required class="form-control" name="date" multiple="multiple" accept="application/pdf">
                                    </div>
                                </div>

                               
                                
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit">Submit</button>
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