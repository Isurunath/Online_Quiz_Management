<!DOCTYPE html>
<html>
<head>
    <title>Try it</title>

    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tutelage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />

    <?php
        $this->load->view('links/ref');
    ?>

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
                    <h1><a class="navbar-brand" href="index.html"><i class="glyphicon glyphicon-education" aria-hidden="true"></i><span>Try</span>it</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="hvr-overline-from-center button2 active" href="index.html">Home</a></li>
                        <li><a class="hvr-overline-from-center button2" href="about.html">About</a></li>
                        <li><a class="hvr-overline-from-center button2" href="">Academics</a></li>
                        <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('Paper/paperlayout'); ?>">Paper</a></li>
                        <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('hello/admin'); ?>">Admin</a></li>
                        <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('hello/login'); ?>">Login</a></li>
                    </ul>
            </nav>
        </div>
    </div>
</div>
<!-- header -->

</body>
</html>
