<?php 
include 'header.php';
?>

 <!--Page Title-->
    <section class="page-title text-center">
        <div class="auto-container">
            <div class="content-box">
                <div class="section-title"><h2>Causes</h2></div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
                    <li>Causes</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

<!-- cause section -->
    <section class="our-cause cause-page section-padding text-center">
        <div class="container">
            <div class="cause-title">
                <div class="section-title"><h2>Our <span>CAuses</span></h2></div>
                <div class="title"><p>Cupidatat non proident sunt in culpa qui officia deserunt mollit</p></div>
            </div>
            <div class="row">

                 <?php
                        $query="SELECT * FROM circular ORDER BY id DESC Limit 3";
                        $data=mysqli_query($db, $query) or die ('error to select album');
                         while($row=mysqli_fetch_array($data))
                              {
                        ?>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-holder">
                            <a href="causes-details.html">
                                <figure><img src="admin/circularpdf/<?php echo $row['pdf']; ?>" alt=""></figure>
                                <div class="overlay">
                                </div>
                            </a>
                        </div><br>
                        <div class="cause-content">
                            <!-- <div class="progress-item">
                                <div class="progress" data-value="80">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <div class="value-holder"><span class="value"></span>%</div>
                                    </div>
                                </div>
                            </div> -->
                           <!--  <ul class="meta">
                                <li>Raised: $40,000</li>
                                <li>Goal: $50,000</li>
                            </ul> -->
                            <h4><a href="causes-details.php?id=<?php echo $row['id']; ?> "><?php echo $row['title']; ?></a></h4>
                            <div class="text"><p><?php echo $row['dis']; ?></p></div>
                            <button class="btn-one donate-box-btn">Donate Now</button>
                        </div>
                    </div>
                </div>

                <?php } ?>
                
               
            </div>
            
        </div>
    </section>
    <!-- cause section end -->


<?php include 'footer.php'; ?>