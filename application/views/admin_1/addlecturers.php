<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <?php
        $this->load->view("admin_1/references");
    ?>
</head>
<body>
	<div class="page-container">
	    <!--/sidebar-menu-->
	    <div class="sidebar-menu">
	        <?php
	            $this->load->view("admin_1/sidebar");
	        ?>
	    </div>
	    <div class="left-content">
            <div class="inner-content">
                <!--//outer-wp-->
                <div class="outter-wp">
                    <!--/sub-heard-part-->
                    <div class="sub-heard-part">
                        <ol class="breadcrumb m-b-0">
                            <li><a href="<?php echo site_url('hello/index'); ?>"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                            <li class="active">ViewQuestions</li>
                        </ol>
                    </div>
                    

                    <!--/sub-heard-part-->
                    <!--/forms-->
                    <div class="forms-main">

                        <!--/forms-inner-->
                        <div class="forms-inner">
                            <!--/set-2-->
                            <div class="set-1">
                                <div class="graph-2 general">
                                    <h3 class="inner-tittle two">Add Lecturers</h3>
                                    <div class="grid-1">
                                        <div class="form-body">

                                            <form method="post" name="form_layout" action="<?php echo site_url ('Addlecturers/Register'); ?>" class="form-horizontal">


                                            <?php
                                                if(isset($_GET['r'])){

                                                    if($_GET['r']=='success'){
                                                ?>
                                                <script type="text/javascript">
                                                    alert("Lecturer added successfully");
                                                </script>
                                                <?php
                                                    }
                                                    else{
                                                        ?>
                                                            <script type="text/javascript">
                                                                alert("Fail to add Lecturer");
                                                            </script>
                                                        <?php

                                                    }
                                                }

                                            $CI =& get_instance();
                                            $CI->load->library('form_validation');

                                            if (validation_errors())
                                            {
                                                echo '<div style="color:red;" id="validation_errors" title="Error:" align="left">';
                                                echo validation_errors();
                                                echo '</div>';
                                                echo "<br/>";
                                                echo "<br/>";
                                            }

                                            ?>

                                                <div class="form-group">
                                                    <label for="selector1" class="col-sm-2 control-label">Username</label>
                                                    <div class="col-sm-8">
                                                    <textarea name="name" id="single" class="form-control1" required></textarea></div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="selector1" class="col-sm-2 control-label">E-mail</label>
                                                    <div class="col-sm-8">
                                                    <textarea name="email" id="single" class="form-control1" required></textarea></div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="selector1" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-8">
                                                    <input type="password" name="password" id="single" class="form-control1" required></div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="selector1" class="col-sm-2 control-label">Confirm password</label>
                                                    <div class="col-sm-8">
                                                    <input type="password" name="con_password" id="single" class="form-control1" required></div>
                                                </div>

                                                <button onclick="return doconfirm()" type="submit" class="btn btn-default" style="margin-left: 200px">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  	
                    </div>
                </div>
            </div>
        </div>   
    </div>

</body>
	  