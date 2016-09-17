<!DOCTYPE html>
<html>
<head>
    <title>QuizBank</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tutelage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/swipebox.css">
    <!-- js -->
    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <script src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Alegreya:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- //fonts -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->

</head>
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-nav">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.html"><i class="glyphicon glyphicon-education" aria-hidden="true"></i><span>Quiz</span>Bank</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="hvr-overline-from-center button2 active" href="index.html">Home</a></li>
                        <li><a class="hvr-overline-from-center button2" href="about.html">About</a></li>
                        <li><a class="hvr-overline-from-center button2" href="typography.html">Academics</a></li>
                        <li><a class="hvr-overline-from-center button2" href="services.html">Services</a></li>
                        <li><a class="hvr-overline-from-center button2" href="contact.html">Contact</a></li>
                        <li><a class="hvr-overline-from-center button2" href="contact.html">Login</a></li>
                    </ul>
            </nav>
        </div>
    </div>
</div>
<!-- header -->
<!-- banner -->
<div class="banner">
    <div class="container">
        <script src="<?php echo base_url(); ?>js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider3").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>

        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner-info">
                        <h3>You can download your assignments here</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3>Please submit your completed assignments on or before the relevant date</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3>You can download your assignments here</h3>
                    </div>
                </li>
                <li>
                    <div class="banner-info">
                        <h3><b>Please submit your completed assignments on or before the relevant date</b></h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- features -->
<div class="features">
    <div class="container">
        <h3 class="tittle">FEATURES</h3>
        <div class="col-md-5 features-left">
            <img src="images/f1.jpg" alt=""/>
        </div>
        <div class="col-md-7 features-right">
            <h4>Download Question papers & Assignments</h4>
            <p> After you have finished creating your account, you just need to login to our site.
                So that you can download our <b>Papers</b> and <b>Assignments.</b>
                You can download them in PDF format.</p>

            <h4>Different types of questions available</h4>
            <p>In our question papers you can find not only MCQs, but also you can find fill in the blank questions and short
                answer questions
            </p>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //features -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <p> &copy; 2016 Viran Pravinda. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> Viran Pravinda</a></p>
    </div>
</div>
<!-- //footer -->
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>
