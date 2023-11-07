<?php
include 'header.php';


//new album start 
  if(isset($_POST['add_popup']))
      {
    $yourname=$_POST['form_name'];
    $email=$_POST['form_email'];
    $vname = $_POST['vname'];
    $add = $_POST['form_address'];

      $file_name = $_FILES['file']['name'];
       $path="child/";
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      
      move_uploaded_file($file_tmp,$path.$file_name);

  
      $flag=1;
       $finalpath="child/".$file_name;
       
      $sql="insert into rchild (`yourname`,`info`,`vname`,`image`,`address`) VALUES('$yourname','$email','$vname','$finalpath','$add') ";
      $status=mysqli_query($db, $sql)or die ('error in query');
      
      
      if($status)
      {
         echo "<script>alert('Report Added Successfully')</script>";
      } 
        
        
}     
  
?>

<!--Page Title-->
    <section class="page-title text-center">
        <div class="auto-container">
            <div class="content-box">
                <div class="section-title"><h2>Report a Child</h2></div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
                    <li>Report a Child</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- contact info -->
    
    <!-- contact info end -->

    <!-- contact form area -->
    <section class="contact-form-area section-padding text-center">
        <div class="container">
            <div class="contact-title">
                <div class="section-title"><h2>Report A <span>Child</span></h2></div>
                
            </div><br>
            <div class="contact-form">
                <form  class="default-form" action="childr.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                <input type="text" name="form_email" value="" placeholder="Your Email/Mobile No." required="">
                    <input type="text" name="vname" value="" placeholder="Victim Name" required="">
                     <input type="file" required id="password" class="form-control" name="file">
                    <input type="text" name="form_address" value="" placeholder="Full Address" required="">
                        </div>
                        
                    </div>
                    <button type="submit" class="btn-one" name="add_popup">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <!-- contact form area end -->

    <!-- google map area -->
   
    <!-- google map area end -->




<?php
include 'footer.php';
?>