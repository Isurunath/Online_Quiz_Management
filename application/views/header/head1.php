
<!DOCTYPE html>
<html>
<head>
    <title>Try it</title>
    <style>
        .dropbtn {
            /*background-color: #4CAF50;*/
            background-color: transparent;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 99;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            border-bottom: 4px solid red;
            color:  #2FD828;
        }

        .img-circle {
            border-radius: 50%;
        }
    </style>

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
                    <h1><a class="navbar-brand" href="<?php echo site_url('hello/index'); ?>"><i class="glyphicon glyphicon-education" aria-hidden="true"></i><span>Try</span>it</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <?php

                    if(isset($this->session->userdata['logged_in']))
                    {
                    $email = ($this->session->userdata['logged_in']['email']);
                    $username = ($this->session->userdata['logged_in']['username']);
                    $type = ($this->session->userdata['logged_in']['user_type']);

                        if(isset($this->session->userdata['profile_data']))
                        {
                            $Pic = ($this->session->userdata['profile_data']['isProPic']);
                            $id = ($this->session->userdata['profile_data']['prof_user_id']);
                        }

                        if($type == 'STUDENT')
                        {
                        ?>
                            <ul class="nav navbar-nav">
                                <li style="margin-left: 150px"><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Hello") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/index'); ?>">Home</a></li>
                                <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/hello/load_about") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/load_about'); ?>">About Us</a></li>
                                <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Upload/index") { ?>  active   <?php   }  ?>" href="<?php echo site_url('Upload/index'); ?>">Upload</a></li>
                                <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/exam_controller/upcoming_exams") { ?>  active   <?php   }  ?>" href="<?php echo site_url('exam_controller/upcoming_exams'); ?>">Upcoming Exams</a></li>
                                <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Paper/downloadPage") { ?>  active   <?php   }  ?>" href="<?php echo site_url('Paper/downloadPage'); ?>">My Paper</a></li>
                                <!--<li><a class="hvr-overline-from-center button2" href="--><?php //echo site_url('hello/admin'); ?><!--">Admin</a></li>-->
                                <li>
                                    <div class="dropdown">
                                        <?php if($Pic == 0)
                                              {
                                        ?>
                                                    <img class="img-circle" src="../Profile_Pictures/default.png" width="45px" height="45px">
                                        <?php
                                              }
                                              else if($Pic == 1)
                                              {
                                        ?>
                                                    <img class="img-circle" src="../Profile_Pictures/<?php echo $id ?>.jpg" width="45px" height="45px">
                                        <?php
                                              }
                                        ?>
                                        <button class="dropbtn"><?php echo $username ?></button>
                                        <div class="dropdown-content">
                                            <a href="<?php echo site_url('hello/load_profile'); ?>"> <i class="glyphicon glyphicon-user"></i>  My Profile</a>
                                            <a href="<?php echo site_url('loginController/logout'); ?>"> <i class="glyphicon glyphicon-log-out"></i>  Log Out</a>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        <?php
                        }
                        else if($type == 'ADMIN')
                        {
                        ?>
                            <ul class="nav navbar-nav">
                                <li style="margin-left: 350px"><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Hello") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/index'); ?>">Home</a></li>
                                <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/hello/load_about") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/load_about'); ?>">About Us</a></li>
                                <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('View_Lecturers/view_lecturers'); ?>">Admin Panel</a></li>
                                <li>
                                    <div class="dropdown">
                                        <img class="img-circle" src="../Profile_Pictures/default.png" width="45px" height="45px">
                                        <button class="dropbtn"><?php echo $username ?></button>
                                        <div class="dropdown-content">
                                            <a href="<?php echo site_url('LoginController/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                    <?php
                    }
                    else if($type == 'LECTURER')
                    {
                    ?>
                        <ul class="nav navbar-nav">
                            <li style="margin-left: 350px"><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Hello") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/index'); ?>">Home</a></li>
                            <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/hello/load_about") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/load_about'); ?>">About Us</a></li>
                            <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('Layout_Controller/View_layout'); ?>">Lecturer Panel</a></li>
                            <li>
                                <div class="dropdown">
                                    <img class="img-circle" src="../Profile_Pictures/default.png " width="45px" height="45px">
                                    <button class="dropbtn"><?php echo $username ?></button>
                                    <div class="dropdown-content">
                                        <a href="<?php echo site_url('LoginController/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php
                        }
                    }
                    else
                    {
                    ?>
                        <ul class="nav navbar-nav">
                            <li style="margin-left: 380px"><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Hello") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/index'); ?>">Home</a></li>
                            <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/hello/load_about") { ?>  active   <?php   }  ?>" href="<?php echo site_url('hello/load_about'); ?>">About Us</a></li>
                            <li><a class="hvr-overline-from-center button2<?php if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/exam_controller/upcoming_exams") { ?>  active   <?php   }  ?>" href="<?php echo site_url('exam_controller/upcoming_exams'); ?>">Upcoming Exams</a></li>
                          <!--   <li><a class="hvr-overline-from-center button2<?php //if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Upload/index") { ?>  <!--active   <?php  // }  ?><!-- "" href="<?php //echo site_url('Upload/index'); ?> <!--">Upload</a></li> -->
                         <!--    <li><a class="hvr-overline-from-center button2<?php // if($_SERVER['REQUEST_URI']=="/Online_Quiz_Management/Paper/downloadPage") { ?>  <!--active   <?php  // }  ?><!--" href="<?php //echo site_url('Paper/downloadPage'); ?><!--">My Paper</a></li> -->
                          <!-- <li><a class="hvr-overline-from-center button2" href="<?php  //echo site_url('hello/admin'); ?><!-- ">Admin</a></li> -->
                            <li><a class="hvr-overline-from-center button2" href="<?php echo site_url('hello/login'); ?>">Login</a></li>
                        </ul>
                        <?php
                    }
                    ?>
            </nav>
        </div>
    </div>
</div>
<!-- header -->

<?php //echo $_SERVER['REQUEST_URI']; ?>
</body>
</html>
