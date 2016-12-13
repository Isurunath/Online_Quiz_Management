<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Tryit</title>

    <?php
    $this->load->view("admin_1/references");
    ?>

    <!--Bootstrap for the table-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(document).ready(

            /* This is the function that will get executed after the DOM is fully loaded */
            function () {
                $( "#datepicker1" ).datepicker({
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true //this option for allowing user to select from year range
                });
                $( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd");
            }

        );

        $(document).ready(

            /* This is the function that will get executed after the DOM is fully loaded */
            function () {
                $( "#datepicker2" ).datepicker({
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true //this option for allowing user to select from year range
                });
                $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd");
            }

        );

    </script>

    <script>

        $(document).ready(function(){
            $("#thisTable #button2").click(function(){

                var Modal = $('#Modal');

                var $id = $(this).parent().parent().find(".id").text();

                $('#test', Modal).val($id);

                $('#Modal').modal('show');

            });
        });

    </script>

</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/load_admin_panel'); ?>" style="text-decoration:none"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="active">View Registered Students</li>
                    </ol>
                </div>
                <!--/sub-heard-part-->

                <!--  --><?php
                /*                    if(isset($lecname))
                                    {
                                        echo $lecname;
                                    }
                                */?>

                <table class="table table-hover" id="thisTable">
                    <thead>
                    <tr>
                        <th>Student Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Option</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach($posts as $post){?>
                        <tr class="warning">
                            <td class="id"><?php echo $post->prof_user_id;?></td>
                            <td class="batch"><?php echo $post->fname;?></td>
                            <td class="type"><?php echo $post->email;?></td>
                            <td>
                                <button data-toggle="modal" data-target="#Modal" id="button2" type="button" style="font-size:15px;color:red" >
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button>
                            </td>

                            <!-- Modal2 -->
                            <div class="modal fade" id="Modal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 style="color:red;"><span class="glyphicon glyphicon-trash"></span> Delete Layout</h4>
                                        </div>
                                        <form method="post" onSubmit="window.location.reload()" name="form_layout" action="<?php echo site_url ('Layout_Controller/deleteLayout'); ?>" class="form-horizontal">

                                            <div class="modal-body">
                                                <p style="font-size: large">Are you sure you want to remove this layout?</p>
                                                <input style="width: 300px" type="hidden" class="form-control1 input-lg" name="test" id="test">
                                            </div>

                                            <div class="modal-footer">

                                                <button style="margin-left: 150px" type="submit" class="btn btn-info btn-lg">Yes
                                                </button>

                                                <button style="background-color: red"  data-dismiss="modal" type="button" class="btn btn-info btn-lg">No
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>
            <!--//outer-wp-->
            <!--footer section start-->
            <footer>
                <p>&copy 2016 Tryit . All Rights Reserved | Design by SEP_WE_013</a></p>
            </footer>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->

    <?php
    $this->load->View("admin_1/sidebar");
    ?>

    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<script src="<?php echo base_url(); ?>admin_js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>admin_js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>jadmin_js/bootstrap.min.js"></script>
</body>
</html>