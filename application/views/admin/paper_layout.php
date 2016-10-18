<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <?php
    $this->load->view("admin/references");
    ?>

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
                $( "#datepicker1" ).datepicker( "option", "dateFormat", "yy/mm/dd");
            }

        );

        $(document).ready(

            /* This is the function that will get executed after the DOM is fully loaded */
            function () {
                $( "#datepicker2" ).datepicker({
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true //this option for allowing user to select from year range
                });
                $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy/mm/dd");
            }

        );

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
                        <li><a href="<?php echo site_url('hello/admin'); ?>"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                        <li class="active">Create layout</li>
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
                                <h3 class="inner-tittle two">Create Paper layout</h3>

                                <div style="color:red; font-size:20px;">
                                    <?php
                                    if(isset($message))
                                    {
                                        echo 'Error: ';
                                        echo '</br>';
                                        echo $message;
                                    }

                                    $CI =& get_instance();
                                    $CI->load->library('form_validation');

                                    if (validation_errors())
                                    {
                                        echo '<div id="validation_errors" title="Error:" align="left">';
                                        echo '<div class="response-msgs errors ui-corner-all"><span>Errors: <br/><ol>';
                                        echo validation_errors();
                                        echo '</ol></div>';
                                        echo '</div>';
                                    }

                                    ?>
                                </div>

                                <div style="color:blue; font-size:20px;">
                                    <?php

                                    if(isset($message1))
                                    {
                                        echo $message1;
                                    }

                                    ?>
                                </div>

                                <div class="grid-1">
                                    <div class="form-body">
                                        <form method="post" name="form_layout" action="<?php echo site_url ('Layout_Controller/addLayout'); ?>" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Batch No</label>
                                                <div class="col-sm-8"><select name="batchNo" id="batchNo" class="form-control1" required>
                                                        <option value="">--Choose Batch--</option>
                                                        <option>Batch 1</option>
                                                        <option>Batch 2</option>
                                                        <option>Batch 3</option>
                                                        <option>Batch 4</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Paper type</label>
                                                <div class="col-sm-8"><select name="paperType" id="paperType" class="form-control1" required>
                                                        <option value="">--Choose Paper Type--</option>
                                                        <option>Assignment</option>
                                                        <option>Question Paper</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Single Choice</label>
                                                <div class="col-sm-8"><select name="single" id="single" class="form-control1" required>
                                                        <option value="">--Choose no of Single questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                        <option>15</option>
                                                        <option>16</option>
                                                        <option>17</option>
                                                        <option>18</option>
                                                        <option>19</option>
                                                        <option>20</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Multiple Choice</label>
                                                <div class="col-sm-8"><select name="multiple" id="multiple" class="form-control1" required>
                                                        <option value="">--Choose no of Multiple questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Short Answer</label>
                                                <div class="col-sm-8"><select name="shortAnswer" id="shortAnswer" class="form-control1" required>
                                                        <option value="">--Choose no of Short answer questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">True/False</label>
                                                <div class="col-sm-8"><select name="trueFalse" id="trueFalse" class="form-control1" required>
                                                        <option value="">--Choose no of True/False questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group mb-n">
                                                <label for="largeinput" class="col-sm-2 control-label label-input-lg">Downloadable Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1 input-lg" name="datepicker1" id="datepicker1" placeholder="From date" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-n">
                                                <label for="largeinput" class="col-sm-2 control-label label-input-lg">Downloadable Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1 input-lg" name="datepicker2" id="datepicker2" placeholder="To date" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-default" style="margin-left: 175px">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--//set-2-->

                    </div>
                    <!--//forms-inner-->
                </div>
                <!--//forms-->
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
    $this->load->View("admin/sidebar");
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

<script type=”text/javascript” src=”http://code.jquery.com/jquery.js”></script&gt;



</body>
</html>