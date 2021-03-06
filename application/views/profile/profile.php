<?php

if(isset($this->session->userdata['profile_data'])) {
    $id = ($this->session->userdata['profile_data']['prof_user_id']);
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
    $graduating_yr = ($this->session->userdata['profile_data']['eYear']);
    $started_yr = ($this->session->userdata['profile_data']['sYear']);

    $batch = ($this->session->userdata['profile_data']['batch']);
    //remove the "Batch"
    $batch = str_replace("Batch ",'',$batch);

    $date = ($this->session->userdata['profile_data']['date']);
    $month = ($this->session->userdata['profile_data']['month']);
    $year = ($this->session->userdata['profile_data']['year']);
    $batch_time = ($this->session->userdata['profile_data']['bt']);

    //calculate the age
    if($dob != "") {
        $age = date('Y-m-d') - $dob;
    }else
    {
        $age = "";
    }
}

?>
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
                <div class="col-xs-16 col-md-4 col-lg-3 profile-left" id="profile_sidePanel">
                    <div class="profile-left-heading">
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


                        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="editProfile(<?php echo $user_id ?>)"><a href="#myDetails" data-toggle="tab" style="text-decoration: none; color: white;">Edit Profile</a></button>
                        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="changeProfilePicture(<?php echo $user_id ?>)"><a href="#myDetails" data-toggle="tab" style="text-decoration: none; color: white;">Change Profile Picture</a></button>
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
                        <p><i class="glyphicon glyphicon-phone mr5"></i> <?php echo $phone ?></p>

                    </div>
                </div>
                <div class="col-md-8 col-lg-8 profile-right">
                    <div class="profile-right-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified nav-line">
                            <li class="active" id="Details_tab"><a href="#myDetails" data-toggle="tab"><strong>My Details</strong></a></li>
                            <li id="Details_tab2"><a href="#upcomingExams" data-toggle="tab"><strong>Upcoming Exams</strong></a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="myDetails">

                                <div class="panel panel-post-item">
                                    <h4>Basic Information</h4>
                                    <br>
                                    <form method="post">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="padding: 10px; width: 25%;"><i class="fa fa-info-circle"></i> Full Name</td>
                                                <td style="padding: 10px">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $fname; ?></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $lname; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <div id="errorName" class="alert alert-danger" style="display: none;">Cannot Contain Numbers.</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Gender</td>
                                                <td style="padding: 10px">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $gender; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Birthday</td>
                                                <td style="padding: 10px">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $dob; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class="panel panel-post-item">
                                    <h4>Contact Information</h4>
                                    <br>
                                    <form id="contact">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="padding: 10px; width: 25%;"><i class="fa fa-envelope"></i> Email</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <label class="form-control"><?php echo $email; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-list-alt"></i> Address</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <label class="form-control"><?php echo $address1." ".$address2; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-list-alt"></i> City</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $city; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-phone"></i> Contact No</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $phone; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="padding: 10px;">
                                                    <div id="errortel" class="alert alert-danger" style="display: none;">Invalid format.</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class="panel panel-post-item">
                                    <h4>Course Details</h4>
                                    <br>
                                    <form id="basic">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="padding: 10px; width: 25%;"><i class="fa fa-info-circle"></i> Course</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label class="form-control"><?php echo $course; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Batch</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $batch_time."-".$batch; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Graduating in</td>
                                                <td style="padding: 10px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label class="form-control"><?php echo $graduating_yr; ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div class="panel panel-post-item">
                                    <h4><i class="fa fa-mortar-board"></i> About Me</h4>
                                    <br>
                                    <form id="basic">
                                        <table style="width: 100%;">
                                            <tr style="padding: 10px;">
                                                <label class="form-control"><?php echo $about; ?></label>
                                            </tr>
                                        </table>
                                        <br>
                                    </form>
                                </div>



                            </div><!-- tab-pane -->

                            <div class="tab-pane" id="upcomingExams">
                                <?php
                                    //echo $assignments->paper_type;
                                if(!empty($assignments))
                                {
                                    ?>
                                    <div class="panel panel-post-item">
                                        <table class="table table-hover" id="thisTable">
                                            <thead>
                                            <tr style="font-size: 20px">
                                                <th>Batch No</th>
                                                <th>Paper Type</th>
                                                <th>From date</th>
                                                <th>To date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($assignments as $assignment) {
                                                ?>
                                                <tr style="font-family: 'Arial';font-size: 15px" class="info">
                                                    <td class="batch"><?php echo $assignment->batch_no; ?></td>
                                                    <td class="type"><?php echo $assignment->paper_type; ?></td>
                                                    <td class="from"><?php echo $assignment->from_date; ?></td>
                                                    <td class="to"><?php echo $assignment->to_date; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                }
                                else{
                                ?>
                                    <p>You have no upcoming assignments or exams.</p>
                                <?php
                                }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
             </div>

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
        $('#Details_tab').css({
            'color': '#259dab',
            'border-bottom': '1px solid #259dab',
            'background-color': 'transparent',
            /*'border-top': '1px solid #dbdfe6',
            'border-right': '1px solid #dbdfe6',
            'border-left': '1px solid #dbdfe6'*/
        });


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
        $('#Details_tab').css({
            'color': '#259dab',
            'border-bottom': '1px solid #259dab',
            'background-color': 'transparent',
            /*'border-top': '1px solid #dbdfe6',
            'border-right': '1px solid #dbdfe6',
            'border-left': '1px solid #dbdfe6'*/
        });


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
                //location.reload();
                alert("Successfully Updated.");
                reloadSidePanel();
                document.getElementById("myDetails").innerHTML = data;
            },
            error: function (err) {
                alert("error");
            }
        });
    }

    function updateContact(e)
    {
        e.preventDefault();
        //get the posted values
        var address1 = document.getElementById("Address1").value;
        var address2 = document.getElementById("Address2").value;
        var city = document.getElementById("city").value;
        var phone = document.getElementById("phone").value;
        //alert(first_name+" "+last_name+" "+gndr+" "+date+" "+" "+month+" "+year);


        var phoneCk = /^\d{10}$/;

        if(phoneCk.test(phone)) {
            document.getElementById("errorPhone").style.display = 'none';
            $.ajax({

                type: "POST",
                url: "<?php echo site_url('ProfileController/updateContact')?>",
                async: true,
                data: {
                    "address1": address1, "address2": address2, "city": city, "phone": phone
                },
                dataType: 'html',
                success: function (data) {
                    //location.reload();
                    alert("Successfully Updated.");
                    reloadSidePanel();
                    document.getElementById("myDetails").innerHTML = data;
                },
                error: function (err) {
                    alert("error");
                }
            });
        }
        else
        {
            //alert("kjsdjh");
            document.getElementById("errorPhone").innerHTML  = '*Invalid Phone';
            document.getElementById("errorPhone").style.display = 'inline';
        }
    }

    function updateCourse(e)
    {
        e.preventDefault();

        //get the posted values
        var c = document.getElementById("course");
        var course = c.options[c.selectedIndex].value;
        //alert("Hellow2");
        var batch = document.getElementById("batch").value;
        //alert("Hellow3");
        var t = document.getElementById("batch_time");
        var batch_time = t.options[t.selectedIndex].value;
        //alert("Hellow4");
        var g = document.getElementById("grad_yr");
        var grad_yr = g.options[g.selectedIndex].value;

        //alert("Hellow5");
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ProfileController/updateCourse')?>",
            async: true,
            data: {
                "course":course, "batch":batch, "batch_time":batch_time, "grad_yr":grad_yr
            },
            dataType: 'html',
            success: function (data) {
                //location.reload();
                alert("Successfully Updated.");
                reloadSidePanel();
                document.getElementById("myDetails").innerHTML = data;
            },
            error: function (err) {
                alert("error");
            }
        });
    }

    function updateAbout(e)
    {
        e.preventDefault();
        //get the posted values
        var about = document.getElementById("about").value;

        //alert(about);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ProfileController/updateAbout')?>",
            async: true,
            data: {
                "about":about
            },
            dataType: 'html',
            success: function (data) {
                //location.reload();
                alert("Successfully Updated.");
                reloadSidePanel();
                document.getElementById("myDetails").innerHTML = data;
            },
            error: function (err) {
                alert("error");
            }
        });
    }

    function changePassword(e)
    {
        e.preventDefault();
        //get the posted values
        var currentPW = document.getElementById("currentPassword").value;
        var newPW = document.getElementById("newPassword").value;
        var conPw = document.getElementById("confirmPassword").value;

        if(currentPW != "" && newPW != "" && conPw != "") {
            document.getElementById("errorCurrentPW").style.display = 'none';
            document.getElementById("errorNewPW").style.display = 'none';
            document.getElementById("errorConfirmPW").style.display = 'none';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ProfileController/checkPassword')?>",
                data: {
                    "cpw":currentPW
                },
                dataType: 'html',
                success: function (data) {
                    //location.reload();
                    if(data == "true")
                    {
                        //alert(data);
                        document.getElementById("errorCurrentPW").style.display = 'none';
                        if(newPW == conPw)
                        {
                            //alert(newPW);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('ProfileController/updatePassword')?>",
                                data: {
                                    "npw":newPW
                                },
                                dataType: 'html',
                                success: function (data) {
                                    alert("Successfully Updated.");
                                    document.getElementById("myDetails").innerHTML = data;
                                },
                                error: function (err) {
                                    alert("error");
                                }
                            });
                        }
                        else
                        {
                            document.getElementById("errorConfirmPW").innerHTML  = '*Not matching';
                            document.getElementById("errorConfirmPW").style.display = 'inline';
                        }
                    }
                    else
                    {
                        //alert(data);
                        document.getElementById("errorCurrentPW").innerHTML  = '*Invalid Password';
                        document.getElementById("errorCurrentPW").style.display = 'inline';
                    }
                },
                error: function (err) {
                    alert(err.message);
                }
            });
        }else
        {
            if(currentPW == "") {
                document.getElementById("errorCurrentPW").innerHTML = '*Empty Field';
                document.getElementById("errorCurrentPW").style.display = 'inline';
            }

            if(newPW == "") {
                document.getElementById("errorNewPW").innerHTML = '*Empty Field';
                document.getElementById("errorNewPW").style.display = 'inline';
            }

            if(conPw == "") {
                document.getElementById("errorConfirmPW").innerHTML = '*Empty Field';
                document.getElementById("errorConfirmPW").style.display = 'inline';
            }
        }

        /* $.ajax({
         type: "POST",
         url: "<?php /*echo site_url('ProfileController/loadSidePanel')*/?>",
     data: {
     },
     dataType: 'html',
     success: function (data) {
     document.getElementById("profile_sidePanel").innerHTML = data;
     },
     error: function (err) {
     alert("error");
     }
     });*/
    }

    function reloadSidePanel()
    {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ProfileController/loadSidePanel')?>",
            data: {
            },
            dataType: 'html',
            success: function (data) {
                document.getElementById("profile_sidePanel").innerHTML = data;
            },
            error: function (err) {
                alert("error");
            }
        });
    }



</script>

</body>
</html>
