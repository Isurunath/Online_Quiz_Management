<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <?php
        $this->load->view("admin/references");
    ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(function() {
            $( "#datepicker1" ).datepicker({ minDate: -100, maxDate: "+0D" });
            $("#datepicker1").datepicker("setDate",new Date());
            $( "#datepicker1" ).datepicker( "option", "dateFormat", "dd/mm/yy");
        });

        $(function() {
            $( "#datepicker2" ).datepicker({ minDate: -100, maxDate: "+0D" });
            $("#datepicker2").datepicker("setDate",new Date());
            $( "#datepicker2" ).datepicker( "option", "dateFormat", "dd/mm/yy");
        });
    </script>

    <script>
        function submitLayout() {
            if(document.getElementById) {
                document.form_layout.reset();
            }
        }
    </script>

</head>
<body>
<div class="page-container">

    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <?php
            $this->load->view("admin/sidebar");
        ?>
    </div>


    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/admin'); ?>">Home</a></li>
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
                                <div class="grid-1">
                                    <div class="form-body">
                                        <form method="post" name="form_layout" action="<?php echo site_url ('layout_controller/Create_layout'); ?>" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Paper type</label>
                                                <div class="col-sm-8"><select name="paperType" id="paperType" class="form-control1">
                                                        <option>--Choose paper type--</option>
                                                        <option>Assignment</option>
                                                        <option>Question Paper</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Single Choice</label>
                                                <div class="col-sm-8"><select name="single" id="single" class="form-control1">
                                                        <option>--Choose no of Single questions--</option>
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
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Multiple Choice</label>
                                                <div class="col-sm-8"><select name="multiple" id="multiple" class="form-control1">
                                                        <option>--Choose no of Multiple questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Short Answer</label>
                                                <div class="col-sm-8"><select name="shortAnswer" id="shortAnswer" class="form-control1">
                                                        <option>--Choose no of Short answer questions--</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">True/False</label>
                                                <div class="col-sm-8"><select name="trueFalse" id="trueFalse" class="form-control1">
                                                        <option>--Choose no of True/False questions--</option>
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
                                                    <input type="text" class="form-control1 input-lg" name="datepicker1" id="datepicker1" placeholder="From date">
                                                </div>
                                            </div>

                                            <div class="form-group mb-n">
                                                <label for="largeinput" class="col-sm-2 control-label label-input-lg">Downloadable Date</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1 input-lg" name="datepicker2" id="datepicker2" placeholder="To date">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-default" style="margin-left: 175px" onclick="submitLayout()">Submit</button>
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

                <!--footer section start-->
                <footer>
                    <p>&copy 2016 Tryit . All Rights Reserved | Design by SEP_WE_013</a></p>
                </footer>
                <!--footer section end-->
            
            </div>
            <!--//outer-wp-->
            
        </div>
    </div>
    <!--//content-inner-->


</div>


    
</body>
</html>