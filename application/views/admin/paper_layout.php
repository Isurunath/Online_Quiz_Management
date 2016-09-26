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



    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <header class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Tryit</h1></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a>
        </header>
        <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
        <!--/down-->
        <div class="down">
            <a href="index.html"><img src="<?php echo base_url(); ?>images/admin.jpg"></a>
            <a href="index.html"><span class=" name-caret">Viran Pravinda</span></a>
            <p>System Administrator in Company</p>
            <ul>
                <li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                <li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
                <li><a class="tooltips" href="index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
            </ul>
        </div>
        <!--//down-->
        <div class="menu">
            <ul id="menu" >
                <li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Tabs &amp; Panels</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="tabs.html"> Tabs &amp; Panels</a></li>
                        <li id="menu-academico-boletim" ><a href="widget.html">Widgets</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="calender.html">Calendar</a></li>

                    </ul>
                </li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Layouts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('hello/load_layout  '); ?>">Create layout</a></li>
                        <li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>
                        <li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>
                        <li id="menu-academico-boletim" ><a href="buttons.html">Buttons</a></li>
                    </ul>
                </li>

                <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Components</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="grids.html">Grids</a></li>
                        <li id="menu-academico-boletim" ><a href="media.html">Media Objects</a></li>

                    </ul>
                </li>
                <li><a href="chart.html"><i class="lnr lnr-chart-bars"></i> <span>Charts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul>
                        <li><a href="map.html"><i class="lnr lnr-map"></i> Maps</a></li>
                        <li><a href="graph.html"><i class="lnr lnr-apartment"></i> Graph Visualization</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
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