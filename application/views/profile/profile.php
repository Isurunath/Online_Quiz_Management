<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <link href="<?php echo base_url(); ?>admin_css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_css/icon-font.min.css" type='text/css' />
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


    <!--skycons-icons-->
    <script src="<?php echo base_url(); ?>admin_js/skycons.js"></script>

    <script src="<?php echo base_url(); ?>admin_js/jquery.easydropdown.js"></script>

    <link rel="stylesheet" href=<?php echo base_url(); ?>lib/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/weather-icons/css/weather-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/jquery-toggles/toggles-full.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/quirk.css">

    <script src="<?php echo base_url(); ?>lib/modernizr/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>lib/html5shiv/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>lib/respond/respond.src.js"></script>
    <![endif]-->

    <?php
    $this->load->view('links/ref');
    ?>

</head>

<body>
<section>
    <div class="mainpanel">

        <div class="contentpanel">

            <div class="row profile-wrapper">
                <div class="col-xs-16 col-md-4 col-lg-3 profile-left">
                    <div class="profile-left-heading">


                        <?php

                        if(isset($this->session->userdata['profile_data'])) {
                            $fname = ($this->session->userdata['profile_data']['fname']);
                            $lname = ($this->session->userdata['profile_data']['lname']);
                            $course = ($this->session->userdata['profile_data']['course']);
                            $user_id = ($this->session->userdata['profile_data']['prof_user_id']);
                            $pic = ($this->session->userdata['profile_data']['isProPic']);
                            $dob = ($this->session->userdata['profile_data']['dob']);
                            $about = ($this->session->userdata['profile_data']['about_me']);

                            $address1 = ($this->session->userdata['profile_data']['add1']);
                            $address2 = ($this->session->userdata['profile_data']['add2']);
                            $city = ($this->session->userdata['profile_data']['city']);
                            $gender = ($this->session->userdata['profile_data']['gender']);
                            $phone = ($this->session->userdata['profile_data']['phone']);
                            $email = ($this->session->userdata['profile_data']['email']);
                            $gradating_yr = ($this->session->userdata['profile_data']['eYear']);
                            $started_yr = ($this->session->userdata['profile_data']['sYear']);
                            $batch = ($this->session->userdata['profile_data']['batch']);

                            //calculate the age
                            $age = date('Y-m-d') - $dob;
                        }

                        ?>

                        <ul class="panel-options">
                            <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        </ul>
                        <?php if($pic == 0)
                            {
                        ?>
                            <a href="" class="profile-photo"><img class="img-circle img-responsive" src="../Profile_Pictures/default.png" alt=""></a>
                        <?php
                            }
                            else if($pic == 1)
                            {
                        ?>
                            <a href="" class="profile-photo"><img class="img-circle img-responsive" src="../Profile_Pictures/<?php echo $user_id ?>.jpg" alt="">
                        <?php
                        }
                        ?>

                        <h3 class="profile-name"><?php echo $fname ?> <?php echo $lname ?></h3>
                        <h5 class="profile-designation"><?php echo $course ?></h5>

                        <ul class="list-group">
                            <li class="list-group-item"> <a href="timeline.html"></a></li>
                            <li class="list-group-item">Name <a href="people-directory.html"><?php echo $fname ?></a></li>
                            <li class="list-group-item">Age <a href="people-directory-grid.html"><?php echo $age ?></a></li>
                        </ul>


                        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="editProfile(<?php echo $user_id ?>)">Edit Profile</button>
                        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="changeProfilePicture(<?php echo $user_id ?>)">Change Profile Picture</button>
                    </div>
                    <div class="profile-left-body">
                        <h4 class="panel-title">About Me</h4>
                        <p><?php echo $about ?></p>

                        <hr class="fadeout">

                        <h4 class="panel-title">Location</h4>
                        <p><i class="glyphicon glyphicon-map-marker mr5"></i> <?php echo $city ?>, Sri Lanka</p>

                        <hr class="fadeout">

                        <h4 class="panel-title">Course</h4>
                        <p><i class="glyphicon glyphicon-briefcase mr5"></i> <?php echo $course ?></p>

                        <hr class="fadeout">

                        <h4 class="panel-title">Contacts</h4>
                        <p><i class="glyphicon glyphicon-phone mr5"></i> <?php $phone ?></p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-8 profile-right">
                    <div class="profile-right-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified nav-line">
                            <li class="active"><a href="#myDetails" data-toggle="tab"><strong>My Details</strong></a></li>
                            <li><a href="#upcomingExams" data-toggle="tab"><strong>Upcoming Exams</strong></a></li>
                            <li><a href="#results" data-toggle="tab"><strong>Exam Results</strong></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="myDetails">

                                <div class="panel panel-post-item">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img alt="" src="../images/photos/profilepic.png" class="media-object img-circle">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Barbara Balashova</h4>
                                                <p class="media-usermeta">
                                                    <span class="media-time">July 06, 2015 8:30am</span>
                                                </p>
                                            </div>
                                        </div><!-- media -->
                                    </div><!-- panel-heading -->
                                    <div class="panel-body">
                                        <p>As a web designer it’s your job to help users find their way to what they’re looking for. It can be easy to put the needs of your users to one side, but knowing your users, understanding their roles, goals, motives and behavior will confirm how you structure your navigation model. <a href="http://goo.gl/QTccRE" target="_blank">#information</a> <a href="http://goo.gl/QTccRE" target="_blank">#design</a></p>
                                        <p>Source: <a href="http://goo.gl/QTccRE" target="_blank">http://goo.gl/QTccRE</a></p>

                                    </div>
                                    <div class="panel-footer">
                                        <ul class="list-inline">
                                            <li><a href=""><i class="glyphicon glyphicon-heart"></i> Like</a></li>
                                            <li><a><i class="glyphicon glyphicon-comment"></i> Comments (0)</a></li>
                                            <li class="pull-right">5 liked this</li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Write some comments">
                                    </div>
                                </div><!-- panel panel-post -->



                            </div><!-- tab-pane -->

                            <div class="tab-pane" id="upcomingExams">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                            <div class="tab-pane" id="results">
                                Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 profile-sidebar">
                    <div class="row">
                        <div class="col-sm-10 col-md-16">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">People You May Know</h4>
                                </div>
                                <div class="panel-body">
                                    <ul class="media-list user-list">
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user9.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="">Ashley T. Brewington</a></h4>
                                                <span>5,323</span> Followers
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user10.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="">Roberta F. Horn</a></h4>
                                                <span>4,100</span> Followers
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user3.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="">Jennie S. Gray</a></h4>
                                                <span>3,508</span> Followers
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user4.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="">Alia J. Locher</a></h4>
                                                <span>3,508</span> Followers
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user6.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="">Jamie W. Bradford</a></h4>
                                                <span>2,001</span> Followers
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- panel -->
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Following Activity</h4>
                                </div>
                                <div class="panel-body">
                                    <ul class="media-list user-list">
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user2.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading nomargin"><a href="">Floyd M. Romero</a></h4>
                                                is now following <a href="">Christina R. Hill</a>
                                                <small class="date"><i class="glyphicon glyphicon-time"></i> Just now</small>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user10.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading nomargin"><a href="">Roberta F. Horn</a></h4>
                                                commented on <a href="">HTML5 Tutorial</a>
                                                <small class="date"><i class="glyphicon glyphicon-time"></i> Yesterday</small>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user3.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading nomargin"><a href="">Jennie S. Gray</a></h4>
                                                posted a video on <a href="">The Discovery</a>
                                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 25, 2015</small>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user5.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading nomargin"><a href="">Nicholas T. Hinkle</a></h4>
                                                liked your video on <a href="">The Discovery</a>
                                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-circle" src="../images/photos/user2.png" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading nomargin"><a href="">Floyd M. Romero</a></h4>
                                                liked your photo on <a href="">My Life Adventure</a>
                                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- panel -->
                        </div>
                    </div><!-- row -->

                </div>
            </div><!-- row -->

        </div><!-- contentpanel -->
    </div><!-- mainpanel -->

</section>


<script src="<?php echo base_url(); ?>lib/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>lib/jquery-toggles/toggles.js"></script>

<script src="<?php echo base_url(); ?>js/quirk.js"></script>

<script type="text/javascript">
    /*Change the profile picture*/
    function changeProfilePicture(id)
    {
        $.ajax({

            type: "POST",
            url: "<?php echo site_url('ProfileController/viewPicChange')?>",
            data: {
                id:id
            },
            dataType: 'html',
            success: function (data) {
                document.getElementById("myDetails").innerHTML = data;
                //alert(data);
            },
            error: function (err) {
                alert("error");
            }
        });

    }


    /*Edit Profile Details*/
    function editProfile(id)
    {
        $.ajax({

            type: "POST",
            url: "<?php echo site_url('ProfileController/viewEditProfile')?>",
            data: {
                id:id
            },
            dataType: 'html',
            success: function (data) {
                document.getElementById("myDetails").innerHTML = data;
                // alert(data);
            },
            error: function (err) {
                alert("error");
            }
        });

    }


    function updateBasic(e)
    {
        e.preventDefault();
        //get the posted values
        var first_name = document.getElementById('fname').value;
        var last_name = document.getElementById('lname').value;

        var g = document.getElementById("gender");
        var gndr = g.options[g.selectedIndex].value;

        var d = document.getElementById("day");
        var date = d.options[d.selectedIndex].value;

        var m = document.getElementById("month");
        var month = m.options[m.selectedIndex].value;

        var y = document.getElementById("year");
        var year = y.options[y.selectedIndex].value;

        //alert(first_name+" "+last_name+" "+gndr+" "+date+" "+" "+month+" "+year);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ProfileController/updateBasic')?>",
            async: true,
            data: {
                "first_name":first_name, "last_name":last_name, "gender":gndr, "date":date, "month":month, "year":year
            },
            dataType: 'html',
            success: function (data) {
                location.reload();
                alert("Successfully Updated.");
                document.getElementById("myDetails").innerHTML = data;
            },
            error: function (err) {
                alert("error");
            }
        });
    }
</script>

</body>
</html>
