<?php
include 'header.php';
?>

<!--Page Title-->
    <section class="page-title text-center">
        <div class="auto-container">
            <div class="content-box">
                <div class="section-title"><h2>Contuct Us</h2></div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
                    <li>Contuct Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- contact info -->
    <section class="contact-info text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="info-content">
                            <h4>Address</h4>
                            <div class="text"><p>16/14 Babor Road, Mohammad pur Dhaka, Bangladesh.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Phone</h4>
                            <div class="text"><p>+55 654 545 122<br /> +55 654 545 123</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <div class="text"><p>info @example.com<br /> info@Charity.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->

    <!-- contact form area -->
    <section class="contact-form-area section-padding text-center">
        <div class="container">
            <div class="contact-title">
                <div class="section-title"><h2>Get In <span>Touch</span></h2></div>
                <div class="title"><p>Cupidatat non proident sunt in culpa qui officia deserunt mollit</p></div>
            </div>
            <div class="contact-form">
                <form id="contact-form" name="contact_form" class="default-form" action="http://world5.commonsupport.com/2017/Charitex/inc/sendmail.php" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                            <input type="email" name="form_email" value="" placeholder="Your Email" required="">
                            <input type="text" name="form_phone" value="" placeholder="Phone Number" required="">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea placeholder="Message" name="form_message" required=""></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn-one" data-loading-text="Please wait...">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <!-- contact form area end -->

    <!-- google map area -->
    <section class="google-map-area">
        <div 
            class="google-map" 
            id="contact-google-map" 
            data-map-lat="33.652450" 
            data-map-lng="-117.814396" 
            data-icon-path="images/resources/map-marker.png" 
            data-map-title="Landon, United Kingdom" 
            data-map-zoom="12" 
            data-markers='{
                "marker-1": [33.652450, -117.814396, "<h4>Branch Office</h4><p>77/99 Landon UK</p>","images/resources/map-marker.png"]
            }'>

        </div>
    </section>
    <!-- google map area end -->




<?php
include 'footer.php';
?>